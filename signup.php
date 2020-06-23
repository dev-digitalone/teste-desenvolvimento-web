<?php 
    include_once 'resource/Database.php';
    include_once 'resource/utilities.php';

    if(isset($_POST['enviarBtn'])){

        $form_errors = array();

        $require_fields = array('email', 'username', 'password');

        $form_errors = array_merge($form_errors, check_empty_fields($require_fields));

        $fields_to_checck_length = array('username' => 4, 'password' => 6);
        
        $form_errors = array_merge($form_errors, check_min_length($fields_to_checck_length));

        $form_errors = array_merge($form_errors, check_email($_POST));
    }

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
                $result = "<p style='padding: 20px; color: green'>Registrado com Sucesso!</p>";
            }
        }catch(PDOException $ex){
            $result = "<p style='padding: 20px; color: red'>Ocorreu um erro: ".$ex->getMessage()."</p>";
        }           
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Cadastro</title>
</head>
<body>

<h3>Formulário de Cadastro</h3>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors);?>
<form method="post" action="">
    <table>
        <tr><td>Email</td> <td><input type="text" value="" name="email"></td></tr>
        <tr><td>Usuário</td> <td><input type="text" value="" name="username"></td></tr>
        <tr><td>Senha</td> <td><input type="password" value="" name="password"></td></tr>
        <tr><td></td> <td><input type="submit" value="Enviar" name="enviarBtn"></td></tr>
    </table>
</form>

<p><a href="index.php">Voltar</a></p>
    
</body>
</html>