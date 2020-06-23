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
</head>
<body>

<h3>Formulário de Login</h3>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors);?>
<form method="post" action="">
    <table>
        <tr><td>Usuário</td> <td><input type="text" name="username" value=""></td></tr>
        <tr><td>Senha</td> <td><input type="password" name="password" value=""></td></tr>
        <tr><td></td> <td><input type="submit" value="Entrar" name="entrarBtn"></td></tr>
    </table>
    <p><a href="forgot_password.php">Resetar Senha?</a></p>
</form>

<p><a href="index.php">Voltar</a></p>
    
</body>
</html>