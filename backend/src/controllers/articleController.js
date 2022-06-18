const Article = require("../models/Articles");

const { existsOrError, equalsOrError } = require("../utils/validations");
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
            existsOrError(article.author, "Infome o nome do autor!");
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

    static async getArtiles(req, res) {
        const articles = await Article.findAll();

        res.status(200).json({ articles: articles });
    }

    static async getArtilesById(req, res) {
        const id = req.params.id;

        const article = await Article.findOne({
            where: {
                id: id,
            },
        });

        if (!article) {
            res.status(404).json({ msg: "Artigo não encontrado!" });
            return;
        }

        res.status(200).json({ article: article });
    }

    static async getAllUserArticles(req, res) {
        const token = getToken(req);
        const user = await getUserByToken(token);

        const article = await Article.findAll({
            where: {
                UserId: user.id,
            },
        });

        res.status(200).json({ articles: article });
    }

    static async updateArticle(req, res) {
        const id = req.params.id;
        const image = req.file;
        const article = { ...req.body };

        const updatedData = {};

        const token = getToken(req);
        const user = await getUserByToken(token);

        if (image) {
            updatedData.img_url = image.path;
        }

        try {
            const articleExists = await Article.findOne({
                where: {
                    id: id,
                },
            });

            existsOrError(articleExists, "Artigo não encontrado!");

            equalsOrError(
                articleExists.UserId,
                user.id,
                "Atualização não autorizada"
            );

            existsOrError(article.title, "Título não informado!");
            updatedData.title = article.title;
            existsOrError(
                article.description,
                "Informe a descrição do artigo!"
            );
            updatedData.description = article.description;

            existsOrError(article.author, "Infome o nome do autor!");
            updatedData.author = article.author;
        } catch (msg) {
            return res.status(422).send(msg);
        }

        await Article.update(updatedData, {
            where: {
                id: id,
            },
        });

        res.status(200).json({ msg: "Artigo atualizado com sucesso!" });
    }
};
