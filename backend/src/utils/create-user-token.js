const jwt = require("jsonwebtoken");

const dotenv = require("dotenv");
dotenv.config();

const createUserToken = async (user, req, res) => {
    const now = Math.floor(Date.now() / 1000);

    const payload = {
        id: user.id,
        name: user.name,
        email: user.email,
        iat: now,
        exp: now + 60 * 60 * 24 * 3,
    };

    const token = jwt.sign(payload, process.env.AUTHSECRET);

    res.status(200).json({
        msg: "Você está autenticado",
        token: token,
        ...payload,
    });
};

module.exports = createUserToken;
