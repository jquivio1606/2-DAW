<?php
    /*  JUDIT QUIRÓS VIOLERO  */

    //Compruebo que se han mandado datos del formulario
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Obtengo esos datos y los guardo en una variable
        $num1= $_POST["num1"];
        $num2 = $_POST["num2"];

        //Compruebo si se han introducido números. Si no se cumple manda mensaje de error.
        if(is_numeric($num1) && is_numeric($num2)){
            //Compruebo si el segundo valor no es 0. Si no se cumple manda mensaje de error.
            if($num2!= 0){
                echo "La división de ".$num1." entre ".$num2." = ".($num1/$num2)."<br><br>";
            } else {
                echo "El segundo valor no puede ser 0. <br><br>";
            }
        } else {
            echo "No se han introducido números, introduzca algún número. <br><br>";
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for=" num1"> Introduce el primer número: </label><br>
            <input type="text" name="num1"><br><br>
            <label for=" num2"> Introduce el segundo número: </label><br>
            <input type="text" name="num2"><br><br>
            <input type="submit" value="Enviar">
        </form>
</body>
</html>