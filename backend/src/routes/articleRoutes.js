const router = require("express").Router();

const ArticleContoller = require("../controllers/articleController");

const { imageUpload } = require("../utils/image-upload");
const verifyToken = require("../middleware/verify-token");

router.post(
    "/create",
    imageUpload.single("image"),
    verifyToken,
    ArticleContoller.saveArticle
);

module.exports = router;
