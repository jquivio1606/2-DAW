<?php
/*Actividad 6
Crea un script en php que lance una excepción si un número, que generaremos al azar, es 
impar. Debes capturar la excepción y mostrar un mensaje adecuado a esta.*/
//Claudia Ledoldis Patón

    $numAzar=rand(0,100);
    echo "El número elegido al azar es: ".$numAzar;
    try {
        if($numAzar%2!=0){
            throw new Exception("\nEl número es impar");
        }else{
            echo "\nEl número es par";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
?>