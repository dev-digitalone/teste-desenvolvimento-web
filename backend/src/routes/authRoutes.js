const router = require("express").Router();

const AuthController = require("../controllers/authController");

router.post("/signup", AuthController.signup);
router.post("/signin", AuthController.signin);
router.get("/checkUser", AuthController.checkUser);
router.post("/forgotPassword", AuthController.forgotPassword);
router.post("/resetPassword/:token", AuthController.resetPassword);

module.exports = router;
