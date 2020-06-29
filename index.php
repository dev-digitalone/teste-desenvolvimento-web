<!DOCTYPE html>
<html>
<body> 
<?php
$page_title = "Página de Autenticação";
include_once 'partials/header.php';
?>

<main role="main" class="container">

  <div class="flag">
    <h1>Seja bem vindo ao DigitalOne Post</h1>
    <p>Se é membro favor realizar o login <a href="login.php">Login</a></p>
    <p>Se ainda não é membro, realize seu cadastro <a href="signup.php">Cadastro</a></p>
    <p>Logado como {username} <a href="logout.php">Sair</a></p>
  </div>

</main>

 </body>
<?php include_once 'partials/footer.php' ?>;
</html>