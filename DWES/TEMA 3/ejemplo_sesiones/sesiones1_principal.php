<?php    
        session_start();
        if(!isset($_SESSION['usuario'])){ // Comprobar si existe la sesion USUARIO
            header('Location: sesiones1_login');
        } else {
            echo "Bienvenido/a   ".$_SESSION['usuario'];     
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones Principal</title>
</head>
<body>
  
    <br>
    <br>
    <br>
    <a href="./sesiones1_logout.php">  Cerrar sesión </a>
</body>
</html>