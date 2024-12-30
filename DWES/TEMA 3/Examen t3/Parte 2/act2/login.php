<?php

/*  JUDIT QUIRÓS VIOLERO  */

    session_start();

    //Se comprueba si se han el usuario y contraseña son correctos
    function comprobarLogin (){
        if($_POST["user"] == "user" && $_POST["contraseña"] == "abcd"){
            return true;
        } else {
            return false;
        }
    }
    // COmprueba que se ha enviado algo del form
    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        //Comprueba si hay sesiones creadad, y las borra
       if(isset($_SESSION["user"]) && isset($_SESSION["contraseña"])){
            session_destroy();
            setcookie(-1);

        //si no hay sesiones comprueba que los datos son correctos, crea las sesiones, y nos manda a cambPass.php
        } else {
            if (comprobarLogin()){
                $_SESSION["user"] = $_POST["user"];
                $_SESSION["contraseña"] = $_POST["contraseña"];
                header("Location: ./cambPass.php");
            } else {
                echo "El usuario y contraseña no son correctos.";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2</title>
</head>
<body>
   
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <label for="user"> Usuario </label><br> 
        <input type="text" name="user" ><br><br>

        <label for="contraseña"> Contraseña </label><br> 
        <input type="text" name="contraseña" ><br><br>


        <input type="submit" value="Enviar"> 

    </form>
    
</body>
</html>