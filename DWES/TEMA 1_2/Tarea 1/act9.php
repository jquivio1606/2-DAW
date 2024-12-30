<?php
/* Judit Quirós Violero */

$semana = array("Lunes", "Martes", "Jueves", "Miércoles", "Viernes");

$semana['Sab'] = 'Sábado';
$semana['Dom'] = 'Domingo';
print_r($semana);

/* Con esta funcion se añade directamente en la primera posición el Lunes
array_unshift($semana, "Lunes");
print_r($semana);
*/

array_push($semana, "Lunes");
print_r($semana);

sort($semana);
print_r($semana);

?>