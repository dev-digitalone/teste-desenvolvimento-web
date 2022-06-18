const router = require("express").Router();

const UserController = require("../controllers/userController");
const verifyToken = require("../middleware/verify-token");

router.get("/", verifyToken, UserController.getUsers);
router.get("/:id", verifyToken, UserController.getUserById);

module.exports = router;
