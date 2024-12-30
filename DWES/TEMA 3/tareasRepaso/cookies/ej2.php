<?php /* COOKIES 2 */
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["seleccion"])){
        if($_POST["seleccion"]){
            setcookie("nombre", $_POST["usuario"], time()+3600*24);
            setcookie("contraseña",$_POST["password"], time()+3600*24);
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ejercicio 2 </title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Datos de Usuario</legend>
            <label for="usuario">Usuario:</label><br>
            <input type="text" name="usuario" value="<?php if(isset($_COOKIE["nombre"])){ echo $_COOKIE["nombre"]; }?>">
            <br><br>
            <label for="contraseña"> Contraseña:</label><br>
            <input type="text" name="password" value="<?php if(isset($_COOKIE["contraseña"])){ echo $_COOKIE["contraseña"]; } ?>">
            <br><br>
            <input type="checkbox" name="seleccion">
            <label>Recuerdame</label>
            <br><br>
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</body>