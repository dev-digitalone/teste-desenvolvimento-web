const nodemailer = require("nodemailer");
const hbs = require("nodemailer-express-handlebars");
const path = require("path");

const dotenv = require("dotenv");
dotenv.config();

const transporter = nodemailer.createTransport({
    host: process.env.EMAIL_HOST,
    port: process.env.EMAIL_PORT,
    auth: { user: process.env.EMAIL_USER, pass: process.env.EMAIL_PASS },
});

transporter.use(
    "compile",
    hbs({
        viewEngine: {
            defaultLayout: undefined,
            partialsDir: path.resolve("./src/resources/mail/"),
        },
        viewPath: path.resolve("./src/resources/mail/"),
        extName: ".html",
    })
);

module.exports = transporter;
