<?php

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleHome.css">
    <title>Admin page</title>
</head>
<body style="backgorund: #fff;">
    
    <div class="box">
        <h1>Bienvenido, <span><?= $_SESSION['name']; ?></span></h1>
        <p>Esta es una pagina de <span>administrador</span>!!</p>
        <button onclick="window.location.href='../login/logout.php'">Logout</button>
    </div>

</body>
</html>