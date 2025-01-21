<?php
/* • Actividad 2
◦ Crea un array que contenga los meses del año de forma que podamos acceder y 
mostrarlos por estación (Primavera → Marzo, Abril y Mayo). 
◦ Imprime el array con la función var_dump.
◦ Recorre el array e imprime los meses correspondientes a una estación del año.
◦ Imprime el número de elementos que contiene el array.
◦ Imprime solo los valores del array */
//Claudia Ledoldis Patón

    //Crear array
    $array = ["Invierno" => ["Diciembre", "Enero", "Febrero"], 
            "Primavera"=>["Marzo", "Abril", "Mayo"],
            "Verano"=>["Junio", "Julio", "Agosto"],
            "Otoño"=>["Septiembre", "Octubre", "Noviembre"]];

    var_dump($array);
    echo "\n";
    foreach ($array["Otoño"] as $mes){
        echo $mes." " ;
    }
    echo "\n";
    echo "Número de elementos del array: ".count($array);
    echo "\nValores del array: ";
    print_r($array);
?>