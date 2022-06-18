const multer = require("multer");
const path = require("path");

const imageStorage = multer.diskStorage({
    destination: function (req, file, cb) {
        cb(null, "public/images/articles/");
    },

    filename: function (req, file, cb) {
        cb(
            null,
            Date.now() +
                String(Math.floor(Math.random() * 1000)) +
                path.extname(file.originalname)
        );
    },
});


module.exports = { imageUpload };
