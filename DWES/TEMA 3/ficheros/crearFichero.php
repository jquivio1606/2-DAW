<?php

$fich= fopen("fichero_ejemplo.txt", "r");

if($fich === FALSE){
    echo "No se encuenta \" fichero_ejemplo.txt\" \n";
} else {
    echo "\"fichero_ejemplo.txt\" se abrió con éxito <br>\n";
   
}

$fich = fopen("fichero_no_existe.txt", "r");
if($fich === FALSE){
    echo "No se encuenta \" fichero_ejemplo.txt\" \n";
} else {
    echo "\"fichero_no_existe.txt\" se abrió con éxito\n";
}

?>