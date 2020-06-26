<?php require_once("Includes/DB.php") ?>
<?php require_once("Includes/Functions.php") ?>
<?php require_once("Includes/Sessions.php") ?>

<?php
if (isset($_SESSION["Username"])) {
  Redirect("Home.php");
}



Login();
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
        <a class="nav-link" href="Home.php?author=<?php echo $_SESSION["Username"] ?>">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 input-group-sm ">
      <a href="Cadastro.php" class="btn btn-primary mx-3 btn-sm text-white" type="submit">Cadastro</a>
    </form>
    </ul>
  </nav>

  <section class="container py-4">
    <?php
    echo MensagemDeErro();
    echo Sucesso();
    ?>
    <div class="row">
      <div class="col-md-4">
        <form action="Login.php" method="post">
          <div class="form-group input-group-sm">
            <label for="Name">Username</label>
            <input type="Name" name="Name" class="form-control" id="Name">
          </div>
          <div class="form-group input-group-sm">
            <label for="Password">Password</label>
            <input type="Password" name="Password" class="form-control" id="Password">
            <small class="my-2 form-text text-muted">Ainda não tem uma conta? <a class="text-dark" href="Cadastro.php"> Registre-se</a></small>
            <small id="passwordHelp" class="form-text text-muted"><a class="text-dark" href="RecuperacaoSenha.php">Esqueceu sua senha?</a></small>
          </div>
          <button name="Submit" type="Submit" class="btn btn-sm btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>