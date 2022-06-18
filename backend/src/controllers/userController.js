const User = require("../models/User");

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
};
