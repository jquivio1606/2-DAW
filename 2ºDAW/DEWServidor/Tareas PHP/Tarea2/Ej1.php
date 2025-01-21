<?php
//Claudia Ledoldis Patón
/*1. Incluye los dígitos de la cadena “H-o-l-a” en un array, e imprimelo por pantalla recorriendo
el array. Al mostrarlo por pantalla, deberá mostrar la cadena Hola, sin guiones por medio.*/

    $cad = "H-o-l-a";

    $array = explode("-", $cad);

    foreach ($array as $valor){
        echo $valor;
    }
    
?>