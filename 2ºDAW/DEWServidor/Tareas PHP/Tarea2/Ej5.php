<?php
//Claudia Ledoldis Patón
/*5. Modifica el ejercicio anterior de forma que haya una función controladora que sea la que
llame a la función correspondiente en función del número que le pasemos como argumento,
de forma que si le pasamos el 1, ejecutará la suma, si es el 2 la resta y con el 3 la
multiplicación. La función controladora tomará por defecto el 1.*/

$num1 = 5;
$num2 = 4;

function controladora( $operacion, $num1, $num2){
    switch ($operacion){
        case 1:
            $resul = suma($num1, $num2);
            break;
        case 2:
            $resul = resta($num1,$num2);
            break;
        case 3:
            $resul = multiplicacion($num1,$num2);
            break;
    }
    return $resul;
}
function suma ($num1, $num2){
    return $num1 + $num2;
}
function resta ($num1, $num2){
    return $num1 - $num2;
}
function multiplicacion ($num1, $num2){
    return $num1 * $num2;
}

echo "La suma de los valores es: ".controladora(1, $num1, $num2);
echo "\nLa resta de los valores es: ".controladora(2, $num1, $num2);
echo "\nLa multipicación de los valores es: ".controladora(3, $num1, $num2);
?>