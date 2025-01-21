<?php
/*Actividad 5
Crea una función para calcular potencias, recibirá como argumentos la base y el exponente, 
que es opcional y tiene valor por defecto 2 (elevar al cuadrado*/
//Claudia Ledoldis Patón

    function potencia($base, $exponente=2){
        return pow($base,$exponente);
    }

    echo potencia(3);
    echo "\n";
    echo potencia(2,3);
?>