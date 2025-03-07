<?php

session_start();
require_once '../config/config.php';

if (isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash( $_POST['password'], PASSWORD_BCRYPT, ['cost' => 4]);
    $role = $_POST['role'];

    $checkEmail = $connect->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'El correo ya esta registrado!';
        $_SESSION['active_form'] = 'register';
    } else{
        $connect->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    }

    header("Location: ../index.php");
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $connect->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] === 'admin') {
                header("Location: ../Home/admin_page.php");
            } else{
                header("Location: ../Home/user_page.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = 'Contraseña o email incorrecto';
    $_SESSION['active_form'] = 'login';
    header("Location: ../index.php");
    exit();
}

?>