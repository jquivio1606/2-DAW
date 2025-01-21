<?php
    //Abrir fichero que existe
    $fich =fopen("fichero_ejemplo.txt", "r");
    if($fich===FALSE){
        echo "No se encuentra fichero_ejemplo.txt\n";
    } else {
        echo "fichero_ejemplo.txt se abrió con éxito\n";
    }

    //Abrir fichero que no existe
    $fich =fopen("fichero_no_existe.txt", "r");
    if($fich===FALSE){
        echo "No se encuentra fichero_no_existe.txt\n";
    } else {
        echo "fichero_no_existe.txt se abrió con éxito\n";
    }
?>