<?php

$meses= array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
print_r($meses); // Pinta el array

sort($meses); // Ordena el array por orden alfabetico
print_r($meses); // Pinta el array

$meses[3]= strtoupper($meses[3]); //Convierte en mayuscula la cadena de la posicion 3 del array.
//$meses[3]= mb_convert_case($meses[3], MB_CASE_UPPER);  TAMBIEN SE PUEDE HACER ASí

print_r($meses); // Pinta el arraymodificado



?>