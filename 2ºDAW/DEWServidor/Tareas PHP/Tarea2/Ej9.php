<?php
//Claudia Ledoldis Patón
/* 9. Crea un script en php que compruebe si un número es mayor o menor a 5. Si es mayor, mostrar el mensaje
"El número es mayor a 5", y si es menor debe lanzar una excepción. Debes capturar la excepción y mostrar un mensaje adecuado a esta,
con try y catch. El número a comprobar lo guardaremos en una constante y usaremos esta para la comprobación*/

define("num",2);

function comprobarmayor(){
    if (num>5){
        return num>5;
    } else {
        throw new Exception("El número es menor que 5.");
    }
}
try{
    comprobarmayor(num);
    echo ("El número es mayor que 5.");
} catch (Exception $e) {
    echo $e->getMessage();
}
?>