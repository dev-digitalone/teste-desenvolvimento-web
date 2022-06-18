const router = require("express").Router();

const UserController = require("../controllers/userController");

router.get("/", UserController.getUsers);
router.get("/:id", UserController.getUserById);

module.exports = router;
