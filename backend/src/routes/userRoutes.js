const router = require("express").Router();

const UserController = require("../controllers/userController");
const verifyToken = require("../middleware/verify-token");

router.get("/", verifyToken, UserController.getUsers);
router.get("/:id", verifyToken, UserController.getUserById);
router.patch("/:id", verifyToken, UserController.updateUser);

module.exports = router;
