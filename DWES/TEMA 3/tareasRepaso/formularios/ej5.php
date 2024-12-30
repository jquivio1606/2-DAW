<?php /*FORMULARIO CON POST USUARIO--CONTRASEÑA*/

if($_SERVER ["REQUEST_METHOD"] == "POST"){
    if ($_POST["usuario"] == "usuario" && $_POST["contraseña"] == "0000"){
        header("Location: index.html");
    } else  {
        $error= true;
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    
    <form action="" method="post">
        <label for="usuario"> Usuario: </label><br>
        <input type="text" name="usuario">
        <br><br>
        <label for="contraseña"> Contraseña: </label><br>
        <input type="password" name="contraseña">
        <br><br>
        <input type="submit">
    </form>


</body>
</html>