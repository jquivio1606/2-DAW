<?php

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