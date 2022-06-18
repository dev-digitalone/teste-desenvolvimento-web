const jwt = require("jsonwebtoken");
const getToken = require("../utils/get-token");

const dotenv = require("dotenv");
dotenv.config();

const verifyToken = (req, res, next) => {
    if (!req.headers.authorization) {
        return res.status(401).send("Acesso negado!");
    }

    const token = getToken(req);

    if (!token) return res.status(401).status.send("Acesso negado!");

    try {
        const verified = jwt.verify(token, process.env.AUTHSECRET);
        req.user = verified;
        next();
    } catch (msg) {
        return res.status(400).send("Token Inválido!");
    }
};

module.exports = verifyToken;
