<?php

$ingredientes="pan, carne, queso, tomate";

$array = explode(", ", $ingredientes);

foreach($array as $ingr){
    echo $ingr."\n";
}

foreach($array as $ingr){
    echo $ingr.", ";
}


?>