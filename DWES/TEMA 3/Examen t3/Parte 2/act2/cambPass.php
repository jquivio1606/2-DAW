<?php

/*  JUDIT QUIRÓS VIOLERO  */

    session_start();

    //Comprueba que se hha mandado algo en el form
    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        //Comprubea si existe las sesiones, sino te manda pal login
        if(isset($_SESSION["user"]) && isset($_SESSION["contraseña"])){
            //Comprueba si la clave 1 coincide con la contraseña actual, y si no da error
            if($_POST["clave1"] == $_SESSION["contraseña"]){
                    $_SESSION["contraseña"] = $_POST["clave2"];
                    header("Location camPass.php");
            } else {
                    echo "La contraseña introducida no coincide con tu contraseña actual";
            }
        } else {
            header("Location: login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cambio contraseña </title>
</head>
<body>
   
    <form action="" method="post">

        <label for="clave1"> Contraseña actual: </label><br> 
        <input type="password" name="clave1" ><br><br>

        <label for="clave2"> Nueva contraseña </label><br> 
        <input type="password" name="clave2" ><br><br>


        <input type="submit" value="Enviar">
        <br><br>
        <a href="login.php">Volver al login</a> 
        <a href="salir.php">Salir</a> 

    </form>
    
</body>
</html>