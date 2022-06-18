const express = require("express");
const app = express();
const cors = require("cors");

app.use(cors({ credentials: true, origin: "http://localhost:3000" }));

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Public folder for images
app.use(express.static("public"));

// Routes
const AuthRoutes = require("./routes/authRoutes");
const UserRoutes = require("./routes/userRoutes");
const ArticleRoutes = require("./routes/articleRoutes");

app.use("/", AuthRoutes);
app.use("/users", UserRoutes);
app.use("/articles", ArticleRoutes);

module.exports = app;
