<?php /* FORMULARIOS CON GET */

    //http://localhost:3000/TEMA%203/tareasRepaso/suma.php?num1=2&num2=4

    
    if (is_numeric($_GET["num1"]) || is_numeric($_GET["num2"])){ 
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];
        echo $num1." + ".$num2." = ".($num1+$num2);
    } else if(!isset($num1) && !isset($num2)){
        echo "No se han pasado los parametros";
    } else {
        echo "Los parametros pasados no son números.";
        
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma</title>
</head>
<body>
    <form action="./suma.php" method="get">
        <input type="number" name="num1">
        <input type="number" name="num2">
        <input type="submit" id="btn" value="Enviar">
    </form>
   
</body>
</html>