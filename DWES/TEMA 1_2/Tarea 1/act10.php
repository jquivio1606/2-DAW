<?php
/* Judit Quirós Violero */

function calcular_potencia($base, $exponente = 2) {
    return pow($base, $exponente);
}

echo "La potencia de 3 al cuadrado es: ".calcular_potencia(3)."\n"; 
echo "La potencia de 2 elevado a 4 es: ".calcular_potencia(2, 4); 
?>