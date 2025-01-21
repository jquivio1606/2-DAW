<?php
//Claudia Ledoldis Patón
/*4. Crea tres funciones que devolverán el resultado de realizar la suma, resta o multiplicación de
los valores que se le pasen como argumento, devolviendo el resultado. Las funciones solo
realizan la operación, el resultado se mostrará por pantalla, pero fuera de las funciones.*/

$num1 = 3;
$num2 = 5;

function suma ($num1, $num2){
    return $num1 + $num2;
}
function resta ($num1, $num2){
    return $num1 - $num2;
}
function multiplicacion ($num1, $num2){
    return $num1 * $num2;
}


echo "La suma de los valores es: ".suma($num1, $num2);
echo "\nLa resta de los valores es: ".resta($num1, $num2);
echo "\nLa multipicación de los valores es: ".multiplicacion($num1, $num2);
?>