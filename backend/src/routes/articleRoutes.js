const router = require("express").Router();

const ArticleContoller = require("../controllers/articleController");

const { imageUpload } = require("../utils/image-upload");

router.post(
    "/create",
    imageUpload.single("image"),
    ArticleContoller.saveArticle
);

module.exports = router;
