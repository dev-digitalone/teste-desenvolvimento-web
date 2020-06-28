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

<?php $page_title = "Página de Login"; 
include_once 'partials/header.php';
?>

<div class="container" style="margin-top: 50px;">
  <section class="col col-lg-7">
  <h2>Formulário de Login</h2>
  <?php if(isset($result)) echo $result; ?>
  <?php if(!empty($form_errors)) echo show_errors($form_errors);?>

  <form action="" method="post">
  <div class="form-group">
    <label for="usernameField">Usuário</label>
    <input type="text" class="form-control" name="username" id="usernameField" placeholder="Usuário">
  </div>
  <div class="form-group">
    <label for="passwordField">Senha</label>
    <input type="password" class="form-control" name="password" id="passwordField" placeholder="Senha">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="checkinput" id="checkInput">
    <label class="form-check-label" for="checkInput">Lembrar meus dados</label>
  </div>
  <a href="forgot_password.php">Esqueceu da senha?</a>
  <button type="submit" name="entrarBtn" class="btn btn-primary" style="margin-left: 550px;">Entrar</button>
</form>

  </section>
</div>
    

<?php include_once 'partials/footer.php';?>