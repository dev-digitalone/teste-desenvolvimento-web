<?php

include_once 'resource/Database.php';
include_once 'resource/utilities.php';

if(isset($_POST['enviarBtn'])){
   
    $form_errors = array();

    $required_fields = array('email', 'username', 'password');

    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    $fields_to_check_length = array('username' => 4, 'password' => 6);

    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    $form_errors = array_merge($form_errors, check_email($_POST));

    if(empty($form_errors)){

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        try{

            $sqlInsert = "INSERT INTO users (name, email, password, join_date)
              VALUES (:username, :email, :password, now())";

            $statement = $db->prepare($sqlInsert);

            $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));

            if($statement->rowCount() == 1){
                $result = "<p style='padding:20px; border: 1px solid gray; color: green;'> Registrado com Sucesso</p>";
            }
        }catch (PDOException $ex){
            $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> Algum erro ocorreu: ".$ex->getMessage()."</p>";
        }
    }
    else{
        if(count($form_errors) == 1){
            $result = "<p style='color: red;'> There was 1 error in the form<br>";
        }else{
            $result = "<p style='color: red;'> Existem " .count($form_errors). " erros no formulário <br>";
        }
    }

}

?>

<?php $page_title = "Página de Cadastro";
include_once 'partials/header.php';
?>

<div class="container" style="margin-top: 50px;">
  <section class="col col-lg-7">
  <h2>Formulário de Cadastro</h2>
  <?php if(isset($result)) echo $result; ?>
  <?php if(!empty($form_errors)) echo show_errors($form_errors);?>

  <form action="" method="post">
  <div class="form-group">
    <label for="emailField">Email</label>
    <input type="text" class="form-control" name="email" id="emailField" placeholder="Email">
  </div>
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
  <button type="submit" name="enviarBtn" class="btn btn-primary" style="margin-left: 550px;">Enviar</button>
</form>

  </section>
</div>
    

<?php include_once 'partials/footer.php';?>