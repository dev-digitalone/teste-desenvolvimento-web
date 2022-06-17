const express = require("express");
const app = express();
const cors = require("cors");

app.use(cors({ credentials: true, origin: "http://localhost:3000" }));

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Routes
const AuthRoutes = require("./routes/authRoutes");

app.use("/", AuthRoutes);

module.exports = app;
