<?php /* EJERCICIO SESIONES part 2 */
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ejercicio 1: Sesiones </title>
</head>
<body>
    <h1> Hola  <?php echo $_SESSION["nombre"]."   ".$_SESSION["apellido"];  ?> !!!!</h1>
</body>
</html>