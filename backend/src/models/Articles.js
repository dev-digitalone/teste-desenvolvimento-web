const { DataTypes } = require("sequelize");

const db = require("../config/db/conn");

const User = require("./User");

const Articles = db.define("Articles", {
    title: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    description: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    img_url: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    author: {
        type: DataTypes.STRING,
        allowNull: false,
    },
});

Articles.belongsTo(User);

module.exports = Articles;
