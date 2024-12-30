<?php
/* Judit Quirós Violero */

$semana = array("Lunes", "Martes", "Jueves", "Miércoles", "Viernes");

$semana['Sab'] = 'Sábado';
$semana['Dom'] = 'Domingo';
print_r($semana);

unset($semana[0]);

print_r($semana);

?>