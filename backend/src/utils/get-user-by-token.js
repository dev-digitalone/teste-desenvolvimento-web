const jwt = require("jsonwebtoken");

const User = require("../models/User");

const dotenv = require("dotenv");
dotenv.config();

const getUserByToken = async (token, res) => {
    if (!token) return res.status(401).send("Acesso negado!");

    const decoded = jwt.verify(token, process.env.AUTHSECRET);

    const user = await User.findOne({
        where: {
            id: decoded.id,
        },
    });

    return user;
};

module.exports = getUserByToken;
