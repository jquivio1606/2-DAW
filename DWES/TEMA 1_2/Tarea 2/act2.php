<?php
/*  JUDIT QUIROS VIOLERO  */

$cadena= "Judit*Quiros*Violero";

$array = explode("*", $cadena);

list($nombre, $apellido1, $apellido2) = $array;

echo  "$nombre \n";
echo  "$apellido1 \n";
echo  "$apellido2 \n";
echo $nombre." ".$apellido1." ".$apellido2;

// Actividad 3: Un array en PHP puede ser indexado o asociativo, mientras que una lista suele referirse a un array indexado. 