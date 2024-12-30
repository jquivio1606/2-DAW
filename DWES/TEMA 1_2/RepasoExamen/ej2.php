<?php

$meses= [
   "Enero" => "Invierno", 
   "Febrero" => "Invierno", 
   "Marzo" => "Primavera", 
   "Abril" => "Primavera", 
   "Mayo" => "Primavera", 
   "Junio" => "Verano", 
   "Julio"=> "Verano", 
   "Agosto"=> "Verano", 
   "Septiembre" => "Otoño", 
   "Octubre"=> "Otoño", 
   "Noviembre" => "Otoño", 
   "Diciembre" => "Invierno"
];

print_r($meses);  // Imprime el array
echo "\n------------------------------------------------------------\n";

foreach($meses as $mes => $estacion){
    if($estacion == "Primavera"){
        echo $mes."--";
    }
}

echo "\n------------------------------------------------------------\n";
echo "\nNúmero de elementos que contiene el array: ".count($meses)."\n";

echo "\n------------------------------------------------------------\n";
foreach($meses as $mes){
    echo $mes."--";
}


?>