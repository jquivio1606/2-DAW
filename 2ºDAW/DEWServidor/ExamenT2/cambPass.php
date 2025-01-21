<?php
session_start();
if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])){
    header("Location: login.php");
}
if($_SESSION['pass']==$_POST['actual']){
    $_SESSION['pass']=$_POST['pass'];
} else {
    echo "La contraseña actual no coincide";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cambPass</title>
</head>
<body>
<form action=".php" method="post">
        <label for="user">Contraseña actual: </label>
        <input type="text" name="actual">
        <label for="pass">Contraseña nueva: </label>
        <input type="password" name="pass">
        <br>
        <input type="submit">
    </form>
    <a href="salir.php">Salir</a>
    <br>
    <a href="login.php">Login</a>
    
</body>
</html>