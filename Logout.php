<?php require_once("Includes/Functions.php") ?>
<?php require_once("Includes/Sessions.php") ?>
<?php
$_SESSION["Username"] = null;
session_destroy();
Redirect("Login.php");
