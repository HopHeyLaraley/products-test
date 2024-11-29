<?php

$connect = 'mysql:host=localhost;dbname=test;';
$username = 'root';
$password = '';

try{
    $pdo = new PDO($connect, $username, $password);
}catch (PDOException $e){
    print_r($e);
}

?>