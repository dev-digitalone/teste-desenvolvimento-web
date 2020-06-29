<?php
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

if(isset($_POST['passwordResetBtn'])){
    
    $form_errors = array();

    $required_fields = array('email', 'new_password', 'confirm_password');

    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    $fields_to_check_length = array('new_password' => 6, 'confirm_password' => 6);

    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    $form_errors = array_merge($form_errors, check_email($_POST));

    if(empty($form_errors)){
        $email = $_POST['email'];
        $password1 = $_POST['new_password'];
        $password2 = $_POST['confirm_password'];

        if($password1 != $password2){
            $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> Nova senha e senha de confirmação diferentes</p>";
        }else{
            try{
                $sqlQuery = "SELECT email FROM users WHERE email = :email";

                $statement = $db->prepare($sqlQuery);

                $statement->execute(array(':email' => $email));

                if($statement->rowCount() == 1){
                    
                    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

                    $sqlUpdate = "UPDATE users SET password =:password WHERE email= :email";

                    $statement = $db->prepare($sqlUpdate);

                    $statement->execute(array(':password' => $hashed_password, ':email' => $email));

                    $result = "<p style='padding:20px; border: 1px solid gray; color: green;'> Redefinição de senha bem-sucedida</p>";
                }
                else{
                    $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> O endereço de email fornecido
                    não existe em nosso banco de dados, tente novamente</p>";
                }
            }catch (PDOException $ex){
                $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> Ocorreu um erro: ".$ex->getMessage()."</p>";
            }
        }
    }
    else{
        if(count($form_errors) == 1){
            $result = "<p style='color: red;'> Houve 1 erro no formulário<br>";
        }else{
            $result = "<p style='color: red;'> Existe " .count($form_errors). " erros no formulário <br>";
        }
    }
}
?>

<?php $page_title = "Resetar Senha";
include_once 'partials/header.php';
?>

<div class="container" style="margin-top: 50px;">
  <section class="col col-lg-7">
  <h2>Formulário para Resetar Senha</h2>
  <?php if(isset($result)) echo $result; ?>
  <?php if(!empty($form_errors)) echo show_errors($form_errors);?>

  <form action="" method="post">
  <div class="form-group">
    <label for="emailField">Email</label>
    <input type="text" class="form-control" name="email" id="emailField" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="newPasswordField">Nova Senha</label>
    <input type="password" class="form-control" name="new_password" id="newPasswordField" placeholder="Nova Senha">
  </div>
  <div class="form-group">
    <label for="confirmPasswordField">Confirmar Senha</label>
    <input type="password" class="form-control" name="confirm_password" id="confirmPasswordField" placeholder="Confirmar Senha">
  </div>
  <button type="submit" name="passwordResetBtn" class="btn btn-primary" style="margin-left: 550px;">Enviar</button>
</form>

  </section>
</div>
    

<?php include_once 'partials/footer.php';?>