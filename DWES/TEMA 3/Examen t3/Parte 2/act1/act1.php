<?php

    /*  JUDIT QUIRÓS VIOLERO  */

        // Comprueba si se ha mandado algo del formulario, y si existe la cookie
        if (isset($_COOKIE["idioma"])){
            //Si el valor de $COOKIE es 1 es en Español, sino es en Ingles. Y manda a la pag correspondiente
            if($_COOKIE["idioma"] == "1"){
                //header("Location: ./index.php");
                echo "Idioma: español";
            } else {
                echo "Idioma: ingles";
                //header("Location: ./index_en.php");
            }

            //Si no existe la cookie o esta marcado el español, el checked esta en español, si no en ingles.
            if(!isset($_COOKIE['idioma']) || $_COOKIE['idioma'] == '1'){ 
               $español= 'checked';
               $ingles= '';
            } else {
                $español= '';
                $ingles= 'checked';
            }

        }
   
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>
<body>
   
    <form action="./crearCookie.php" method="post">

        <input type="radio" name="idioma" id="español" value="1" <?php echo $español ?>>
        <label for="español"> Español </label>

        <input type="radio" name="idioma" id="ingles" value="2" <?php echo $ingles ?>>
        <label for="ingles"> Inglés </label>

        <br><br>
        <input type="submit" value="Enviar"> 

    </form>
    
</body>
</html>



