const User = require("../models/User");

const dotenv = require("dotenv");
dotenv.config();

const jwt = require("jsonwebtoken");

const {
    equalsOrError,
    existsOrError,
    notExistsOrError,
} = require("../utils/validations");

const bcrypt = require("bcrypt");
const createUserToken = require("../utils/create-user-token");
const getToken = require("../utils/get-token");

const mailer = require("../modules/mailer");

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
            return res.status(422).json({ msg });
        }
    }

    static async checkUser(req, res) {
        let currentUser;

        if (req.headers.authorization) {
            const token = getToken(req);
            const decoded = jwt.verify(token, process.env.AUTHSECRET);

            currentUser = await User.findOne({
                where: {
                    id: decoded.id,
                },
            });
            currentUser.password = undefined;
        } else {
            currentUser = null;
        }

        res.status(200).send(currentUser);
    }

    static async forgotPassword(req, res) {
        const { email } = req.body;

        try {
            existsOrError(email, "Infrome seu email!");

            const user = await User.findOne({
                where: {
                    email: email,
                },
            });

            existsOrError(user, "Usuário não encontrado!");

            const now = Math.floor(Date.now() / 1000);

            const payload = {
                id: user._id,
                name: user.name,
                email: user.email,
                iat: now,
                exp: now + 60 * 60,
            };

            const token = jwt.sign(payload, process.env.AUTHSECRET);

            const tokens = {
                passwordResetToken: token,
                passwordResetTokenUsed: false,
            };

            await User.update(tokens, {
                where: {
                    id: user.id,
                },
            });

            console.log(process.env.MY_EAMIL);

            mailer.sendMail(
                {
                    to: email,
                    from: process.env.MY_EAMIL,
                    template: "auth/forgot_password",
                    context: { token },
                },
                (err) => {
                    if (err) {
                        return res.status(400).send({
                            error: "Não foi possivel enviar email de recuperação de senha",
                        });
                    }

                    return res
                        .status(200)
                        .send("Recuperação de senha enviada com sucesso!");
                }
            );
        } catch (msg) {
            res.status(400).send(msg);
        }
    }

    static async resetPassword(req, res) {
        const { token } = req.params;

        const { password, confirmPassword } = req.body;

        try {
            existsOrError(password, "Senha não informada");
            existsOrError(confirmPassword, "Confirmação de Senha inválida");
            equalsOrError(password, confirmPassword, "Senhas não conferem");
        } catch (msg) {
            return res.status(400).send(msg);
        }

        const salt = await bcrypt.genSalt(12);
        const passwordHash = await bcrypt.hash(password, salt);

        const verified = jwt.verify(token, process.env.AUTHSECRET);

        const checkUsedToken = await User.findOne({
            where: {
                email: verified.email,
            },
        });

        const user = checkUsedToken;

        const userData = {
            password: passwordHash,
            passwordResetTokenUsed: true,
        };

        if (
            new Date(verified.exp * 1000) > new Date() &&
            checkUsedToken.passwordResetTokenUsed === false
        ) {
            await User.update(userData, {
                where: {
                    id: user.id,
                },
            });

            return res.status(200).send({ msg: "Senha alterada com sucesso!" });
        } else {
            return res.status(400).send("Token inválido!");
        }
    }
};
