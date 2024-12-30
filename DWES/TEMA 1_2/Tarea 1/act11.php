<?php
/* Judit Quirós Violero */

function suma($a, $b) {
    return $a + $b;
}

function realizar_calculo($operacion, $num1, $num2) {
    return $operacion($num1, $num2);
}

$resultado = realizar_calculo('suma', 5, 3);
echo "El resultado de la suma es: ".$resultado;

?>