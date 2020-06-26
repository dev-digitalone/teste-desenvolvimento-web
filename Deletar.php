<?php require_once("Includes/DB.php") ?>
<?php require_once("Includes/Functions.php") ?>
<?php require_once("Includes/Sessions.php") ?>

<?php
$PostId = $_GET["id"];

$ConectarDB;

$sql = "DELETE FROM posts WHERE id='$PostId'";

$Executar = $ConectarDB->query($sql);

if ($Executar) {
  $_SESSION["Sucesso"] = "Post deletado";
  Redirect("Perfil.php");
} else {
  $_SESSION["MensagemDeErro"] = "Erro";
};


?>
