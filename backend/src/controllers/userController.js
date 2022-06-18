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
};
