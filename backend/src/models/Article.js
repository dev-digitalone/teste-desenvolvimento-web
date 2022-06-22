const { DataTypes } = require("sequelize");

const db = require("../config/db/conn");

const User = require("./User");

const Article = db.define("Article", {
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

User.hasMany(Article, {
    onDelete: "CASCADE",
});

Article.belongsTo(User);

module.exports = Article;
