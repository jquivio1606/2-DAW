<?php
/*Actividad 4
Ahora hazlo pero pasando los ingredientes a un array. Recorre el array para imprimirlos uno 
a uno, y luego todo el contenido de una vez.*/
//Claudia Ledoldis Patón
    
    $hamburgesa="Pan, carne, queso, tomate";

    $ingredientes=array(explode(", ", $hamburgesa));

    print_r($ingredientes);
    
    foreach ($ingredientes as $alimento){
        echo $alimento;
    }
?>