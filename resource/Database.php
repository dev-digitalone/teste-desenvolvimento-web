<?php

$username = 'root';
$dsn = 'mysql:host=localhost; dbname=loginpost';
$password = '';

try{
    $db = new PDO($dsn, $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexão realizada com sucesso";

}catch (PDOException $ex) {
    echo "Conexão falhou".$ex->getMessage();
}

