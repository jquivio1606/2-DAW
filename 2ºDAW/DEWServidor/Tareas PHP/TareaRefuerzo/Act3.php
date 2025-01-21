<?php
/*Actividad 3
Guarda en una variable de tipo cadena los ingredientes de una hamburguesa (Pan, carne, 
queso y tomate). A continuación, crea una lista y pásale los valores de la cadena. Por último,
imprime por pantalla los valores de la lista por separado, y luego en una misma línea. */
//Claudia Ledoldis Patón

    $hamburgesa="Pan, carne, queso, tomate";

    $ingredientes=(explode(", ", $hamburgesa));

    print_r($ingredientes);
    
    foreach ($ingredientes as $alimento){
        echo $alimento." ";
    }

?>