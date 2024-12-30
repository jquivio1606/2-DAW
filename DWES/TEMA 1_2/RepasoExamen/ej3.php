<?php

$ingredientes="pan, carne, queso, tomate";

$array = explode(", ", $ingredientes);

list($i1, $i2, $i3, $i4) = $array;

echo $i1."\n";
echo $i2."\n";
echo $i3."\n";
echo $i4."\n";

echo $i1.", ".$i2.", ".$i3.", ".$i4;

?>