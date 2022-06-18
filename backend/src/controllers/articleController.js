const Article = require("../models/Articles");

const { existsOrError } = require("../utils/validations");
const getUserByToken = require("../utils/get-user-by-token");
const getToken = require("../utils/get-token");

module.exports = class ArticleContoller {
    static async saveArticle(req, res) {
        const article = { ...req.body };

        const image = req.file.path;

        const token = getToken(req);
        const user = await getUserByToken(token);

        try {
            existsOrError(article.title, "Infome o título do artigo!");
            existsOrError(
                article.description,
                "Informe a descrição do artigo!"
            );
            existsOrError(image, "Selecione uma imagem!");
            existsOrError(article.author, "Infome o seu nome!");
        } catch (msg) {
            return res.status(422).send(msg);
        }

        const articleData = {
            title: article.title,
            description: article.description,
            img_url: image,
            author: article.author,
            UserId: user.id,
        };

        try {
            await Article.create(articleData);
            res.status(201).json({ msg: "Artigo salvo com sucesso!" });
        } catch (msg) {
            res.status(500).send({ msg: "Opss... ocorreu um erro!" });
        }
    }
};
