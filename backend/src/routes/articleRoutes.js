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

router.get("/", ArticleContoller.getArtiles);
router.get("/myArticles", ArticleContoller.getAllUserArticles);
router.get("/:id", ArticleContoller.getArtilesById);
router.patch(
    "/:id",
    imageUpload.single("image"),
    verifyToken,
    ArticleContoller.updateArticle
);

module.exports = router;
