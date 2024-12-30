<?php /* EJERCICIO SESIONES part 1 */
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["apellido"] = $_POST["apellido"];
        header("Location:saludar.php");
        //echo  $_SESSION["nombre"]."   ".$_SESSION["apellido"];
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ejercicio 1: Sesiones </title>
</head>
<body>
    <form action="" method="post">
        
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre">
        <br><br>
        <label for="apellido">Apellido:</label><br>
        <input type="text" name="apellido">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>