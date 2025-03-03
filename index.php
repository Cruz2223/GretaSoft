<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

$activeForm = $_SESSION['active_form'] ?? 'login';
session_unset();

function showError($error){
    return !empty($error) ? "<p class='error_message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm){
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up <?= isActiveForm('register', $activeForm); ?>">
            <form action="login/login_register.php" method="post">
                <h1>Crea tu cuenta</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                </div>

                <?= showError($errors['register']); ?>
                <span>Usa tu correo para registrarte</span>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role">
                    <option value="">--Rol--</option>
                    <option value="user">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
                <button type="submit" name="register">Registrate</button>
            </form>
        </div>

        <div class="form-container sign-in <?= isActiveForm('login', $activeForm); ?>">
            <form action="login/login_register.php" method="post">
                <h1>Inicia sesion</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                </div>

                <?= showError($errors['register']); ?>
                <?=showError($errors['login']); ?>
                <span>Usa tu correo y contraseña</span>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <a href="#">¿Olvidaste tu contraseña?</a>
                <button type="submit" name="login">Iniciar Sesion</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <!-- <img src="img/Logo Greta.jpeg" alt="logo greta"> -->
                    <h1>Hola Amig@!</h1>
                    <p>Registrate con tus datos</p>
                    <button class="hidden" id="login">Iniciar Sesion</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Bienvenido de nuevo!</h1>
                    <p>Ingresa tus datos</p>
                    <button class="hidden" id="register">Registrarte</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>