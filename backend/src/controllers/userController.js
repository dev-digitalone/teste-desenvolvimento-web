const User = require("../models/User");
const bcrypt = require("bcrypt");

const getToken = require("../utils/get-token");
const getUserByToken = require("../utils/get-user-by-token");

const { equalsOrError, existsOrError } = require("../utils/validations");

module.exports = class UserController {
    static async getUsers(req, res) {
        const userDb = await User.findAll({
            attributes: {
                exclude: ["password"],
            },
        });

        res.status(200).json({ users: userDb });
    }

    static async getUserById(req, res) {
        const id = req.params.id;

        const userDb = await User.findOne({
            where: {
                id: id,
            },
            attributes: {
                exclude: ["password"],
            },
        });

        if (!userDb) {
            res.status(404).json({ msg: "Usuário não encontrado!" });
            return;
        }

        res.status(200).json({ user: userDb });
    }

    static async updateUser(req, res) {
        const token = getToken(req);

        const userInToken = await getUserByToken(token);

        const user = { ...req.body };
        const id = req.params.id;

        try {
            existsOrError(user.name, "Nome não informado");
            userInToken.name = user.name;

            existsOrError(user.email, "Email não informado");

            userInToken.email = user.email;

            equalsOrError(
                user.password,
                user.confirmPassword,
                "Senhas não conferem"
            );

            if (
                user.password === user.confirmPassword &&
                user.password != null
            ) {
                const salt = await bcrypt.genSalt(12);
                const passwordHash = await bcrypt.hash(user.password, salt);

                userInToken.password = passwordHash;
            }

            const userData = {
                name: userInToken.name,
                email: userInToken.email,
                password: userInToken.password,
            };

            try {
                await User.update(userData, {
                    where: { id: id },
                });

                res.status(200).send("Usuário atualizado com sucesso!");
            } catch (msg) {
                res.status(500).send(msg);
                return;
            }
        } catch (msg) {
            return res.status(422).send(msg);
        }
    }

    static async deleteUserById(req, res) {
        const id = req.params.id;

        const user = await User.findOne({
            where: {
                id: id,
            },
        });

        if (!user) {
            res.status(404).json({ msg: "Usuário não encontrado!" });
            return;
        }

        await User.destroy({
            where: {
                id: id,
            },
        });

        res.status(200).json({ msg: "Usuário removido com sucesso!" });
    }
};
