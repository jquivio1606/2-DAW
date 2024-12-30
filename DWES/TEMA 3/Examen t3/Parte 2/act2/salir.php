<?php
 /*  JUDIT QUIRÓS VIOLERO  */

 
    session_start();
    //Borra las sesiones
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    if(isset($_SESSION["user"]) && isset($_SESSION["contraseña"])){
        session_destroy();
        setcookie(-1);
        header("Location: login.php");
     } 
}


?>