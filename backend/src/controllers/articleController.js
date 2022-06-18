const Article = require("../models/Articles");

const { existsOrError } = require("../utils/validations");

module.exports = class ArticleContoller {
    static async saveArticle(req, res) {
        const article = { ...req.body };

        const image = { ...req.file };

        try {
            existsOrError(article.title, "Infome o título do artigo!");
            existsOrError(
                article.description,
                "Informe a descrição do artigo!"
            );
            existsOrError(image.originalname, "Selecione uma imagem!");
            existsOrError(article.author, "Infome o seu nome!");
        } catch (msg) {
            return res.status(422).send(msg);
        }

        const articleData = {
            title: article.title,
            description: article.description,
            img_url: article.image,
            author: article.author,
        };

        try {
            await Article.create(articleData);
            res.status(201).json({ msg: "Artigo salvo com sucesso!" });
        } catch (msg) {
            res.status(500).send({ msg: "Opss... ocorreu um erro!" });
        }
    }
};
