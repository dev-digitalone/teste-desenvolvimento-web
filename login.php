<?php

include_once 'resource/session.php';
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

if(isset($_POST['entrarBtn'])){

    $form_errors = array();

    $required_fields = array('username', 'password');

    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    if(empty($form_errors)){

            $user = $_POST['username'];
            $password = $_POST['password'];

            $sqlQuery = "SELECT * FROM users WHERE name = :username";
            $statment = $db->prepare($sqlQuery);
            $statment->execute(array(':username' => $user));

            while($row = $statment->fetch()){
                $id = $row['id'];
                $hashed_password = $row['password'];
                $username = $row['name'];

            if(password_verify($password, $hashed_password)){
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                header('location: index.php');
            }else {
                $result = "<p style='padding: 20px; color: red; border: 1px solid gray'> Usuario inválido ou senha incorreta</p>";
            }
        }

    }else {
        if(count($form_errors) == 1){
            $result = "<p style='color: red'>Houve um erro no formulário!</p>";
        }else {
            $result = "<p style='color: red'>Existe " .count($form_errors). " erros no formulario</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="css/login.css" rel="stylesheet">
</head>
<body class="text-center">

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <h2><a class="navbar-brand" href="#">DigitalOne Post</a></h2>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="signup.php">Cadastro <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    </div>
</nav>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors);?>
<form class="form-signin" method="post" action="">
  <h1 class="h3 mb-3 font-weight-normal">Entre com Usuário e Senha</h1>
  <label for="inputEmail" class="sr-only">Usuário</label>
  <input type="text" name="username" id="inputUsuario" class="form-control" placeholder="Usuário" required autofocus>
  <label for="inputPassword" class="sr-only">Senha</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Relembrar dados
    </label>
  </div>
  <button class="btn btn-lg btn-secondary btn-block" name="entrarBtn" type="submit">Entrar</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>
    
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>