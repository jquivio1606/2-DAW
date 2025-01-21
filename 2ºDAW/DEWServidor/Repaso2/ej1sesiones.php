<?php //sesiones1
/*1. Crea un script que permita saludar a la persona que ha introducido sus datos. Tendremos un
formulario con dos campos de texto en el que introducir nombre y apellidos, y un botón de
enviar.
Al pulsar este, nos llevará a otra página donde nos mostrará un mensaje saludándonos. */
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){    
    session_start();
    $_SESSION['nombre']=$_POST['nombre'];
    $_SESSION['apellidos']=$_POST['apellidos'];
    header("Location: ej1sesiones2.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludar</title>
</head>
<body>
    <form method="POST">
        <label for="nombre">Nombre: </label>
        <input name="nombre" type="text">
        <br>
        <label for="apellidos">Apellidos: </label>
        <input name="apellidos" type="text">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>