<?php
/* • Actividad 1
◦ Crea un array que contenga los meses del año.
◦ Imprime por pantalla el contenido el array.
◦ Ordénalos en orden ascendente y vuelve a imprimirlos
◦ Cambia el valor introducido para un mes, para que aparezca en mayúsculas (Enero → 
ENERO). Para ello utiliza la función de php que permite convertir una cadena a 
mayúsculas.*/
//Claudia Ledoldis Patón

    //Crear array
    $array = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    //Imprimir por pantalla el contenido del array
    foreach($array as $mes){
        echo $mes." ";
    }
    echo("\n");

    //Ordenar array de forma ascendente
    sort($array);
    foreach($array as $mes){
        echo $mes." ";
    }
    echo("\n");    

    //Poner en mayúsculas
    foreach($array as $mes){
        echo $mes." -> ".strtoupper($mes)."\n";
    }

?>