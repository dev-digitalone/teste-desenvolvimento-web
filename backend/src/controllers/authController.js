const User = require("../models/User");

const {
    equalsOrError,
    existsOrError,
    notExistsOrError,
} = require("../utils/validations");

const bcrypt = require("bcrypt");
const createUserToken = require("../utils/create-user-token");

module.exports = class AuthController {
    static async signup(req, res) {
        const user = { ...req.body };

        try {
            existsOrError(user.name, "Nome não informado");
            existsOrError(user.email, "E-mail não informado");
            existsOrError(user.password, "Senha não informada");
            existsOrError(
                user.confirmPassword,
                "Confirmação de Senha não informada"
            );
            equalsOrError(
                user.password,
                user.confirmPassword,
                "Senhas não conferem"
            );

            const userExists = await User.findAll({
                where: {
                    email: user.email,
                },
            });
            notExistsOrError(userExists, "Email já cadastrado!");
        } catch (msg) {
            return res.status(422).json({ msg });
        }

        const salt = await bcrypt.genSalt(12);
        const passwordHash = await bcrypt.hash(user.password, salt);
        delete user.confirmPassword;

        const userData = {
            name: user.name,
            email: user.email,
            password: passwordHash,
        };

        try {
            const newUser = await User.create(userData);
            await createUserToken(newUser, req, res);
        } catch (msg) {
            return res.status(500).json({ msg: "Ops... ocoreeu um erro" });
        }
    }

    static async signin(req, res) {
        const user = { ...req.body };

        try {
            existsOrError(user.email, "Email não informado");

            const userDb = await User.findOne({
                where: {
                    email: user.email,
                },
            });

            existsOrError(userDb, "Email não cadastrado");

            existsOrError(user.password, "Senha não informada");
            const checkPassword = await bcrypt.compare(
                user.password,
                userDb.password
            );
            existsOrError(checkPassword, "Senha inválida");

            await createUserToken(userDb, req, res);
        } catch (msg) {
            return res.status(422).send(msg);
        }
    }
};
