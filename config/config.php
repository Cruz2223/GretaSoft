<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "users_db";

$connect = new mysqli($host, $user, $password, $db);

if ($connect->connect_error) {
    die("Conection failed: ". $connect->connect_error);
}

?>