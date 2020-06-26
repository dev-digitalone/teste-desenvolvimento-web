<?php require_once("Includes/DB.php") ?>
<?php require_once("Includes/Functions.php") ?>
<?php require_once("Includes/Sessions.php") ?>

<?php
if (isset($_POST["Submit"])) {
  $Name = $_POST["Name"];
  $Email = $_POST["Email"];
  $Password = $_POST["Password"];
  $ConfirmPassword = $_POST["ConfirmPassword"];

  if (empty($Name & $Email & $Password)) {
    $_SESSION["MensagemDeErro"] = "Preencha todos os campos corretamente.";
    Redirect("Cadastro.php");
  }

  if (strlen($Password) < 5) {
    $_SESSION["MensagemDeErro"] = "Sua senha deve conter no mínimo 4 caracteres.";
    Redirect("Cadastro.php");
  }

  if ($Password !== $ConfirmPassword) {
    $_SESSION["MensagemDeErro"] = "Senhas diferentes.";
    Redirect("Cadastro.php");
  } else {
    $ConectarDB;
    $sql = "INSERT INTO users(name, email, password)";
    $sql .= "VALUES(:name, :email, sha2(:password, 224))";
    $stmt = $ConectarDB->prepare($sql);
    $stmt->bindValue(":name", $Name);
    $stmt->bindValue(":email", $Email);
    $stmt->bindValue(":password", $Password);

    $Executar = $stmt->execute();

    Login();

    if ($Executar) {
      Redirect("Home.php");
    } else {
      $_SESSION["MensagemDeErro"] = "Erro";
      Redirect("Cadastro.php");
    }
  }
};
?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>título</title>
</head>

<body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="Home.php">JR</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Home.php">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 input-group-sm ">
      <a href="Login.php" class="btn btn-primary mx-3 btn-sm text-white" type="submit">Login</a>
    </form>
  </nav>

  <section class="container py-4">
    <?php
    echo MensagemDeErro();
    echo Sucesso();
    ?>
    <div class="row">
      <div class="col-md-4">
        <form action="Cadastro.php" method="post">
          <div class="form-group input-group-sm">
            <label for="Name">Username</label>
            <input type="Name" name="Name" class="form-control" id="Name">
          </div>
          <div class="form-group input-group-sm">
            <label for="Email">E-mail</label>
            <input type="Email" name="Email" class="form-control" id="Email">
          </div>
          <div class="form-group input-group-sm">
            <label for="Password">Senha</label>
            <input type="Password" name="Password" class="form-control" id="Password">
          </div>
          <div class="form-group input-group-sm">
            <label for="ConfirmPassword">Confirme sua senha</label>
            <input type="Password" name="ConfirmPassword" class="form-control" id="ConfirmPassword"> </div>
          <button name="Submit" type="Submit" class="m-1 btn btn-sm btn-primary">Enviar</button>
        </form>
        <small class="text-muted">Já tem uma conta? <a class="text-dark" href="Login.php">Faça login</a></small>
        <small id="passwordHelp" class="form-text text-muted"><a class="text-dark" href="RecuperacaoSenha.php">Esqueceu sua senha?</a></small>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>