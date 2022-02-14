<?php
$host = 'localhost';
$database = 'publications';
$user = 'root';
$password = '';

try {
    $mysqli = mysqli_connect($host, $user, $password, $database);
    if(!empty(mysqli_connect_errno())){
        throw new Exception("Ошибка соединения.");
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}
