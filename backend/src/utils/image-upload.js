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

const imageUpload = multer({
    storage: imageStorage,
    limits: {
        fileSize: 2 * 1024 * 1024,
    },
    fileFilter(req, file, cb) {
        if (!file.originalname.match(/\.(png|jpg)$/)) {
            return cb(
                new Error(
                    "Por favor, envie apenas arquivos no formato jpg ou png!"
                )
            );
        }
        cb(undefined, true);
    },
});

module.exports = { imageUpload };
