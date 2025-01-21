<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: sesiones1_login.php");
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones con formulario(Principal)</title>
</head>
<body>
    <?php echo "Bienvenido ".$_SESSION['usuario'];?><br><br>
    <a href="./sesiones1_logout.php">Cerrar sesión</a>
</body>
</html>