const User = require("../models/User");

const {
    equalsOrError,
    existsOrError,
    notExistsOrError,
} = require("../utils/validations");

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
    }
};
