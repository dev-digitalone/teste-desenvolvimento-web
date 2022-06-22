const { DataTypes } = require("sequelize");

const db = require("../config/db/conn");

const User = db.define("User", {
    name: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    email: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    password: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    passwordResetToken: {
        type: DataTypes.STRING,
        allowNull: true,
    },
    passwordResetTokenUsed: {
        type: DataTypes.BOOLEAN,
        allowNull: true,
    },
});

module.exports = User;
