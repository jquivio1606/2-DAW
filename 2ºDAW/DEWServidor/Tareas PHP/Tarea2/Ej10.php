<?php
//Claudia Ledoldis Patón
/* 10. Crea un script en php que lance una excepción si en la cadena “Desarrollo de aplicaciones 
web” no se encuentra la palabra “web”.
La búsqueda de la cadena debe hacerse en una función que llamaremos “búsqueda”, y será 
donde generaremos la excepción.
Habrá que capturar dicha excepción y tratarla, mediante try y catch, mostrando un mensaje 
adecuado en cada caso.*/

define ("cadena", "Desarrollo aplicaciones ");

function busqueda(){
    if (strpos(cadena, "web")){
        return true;
    } else {
        throw new Exception("La palabra web NO se encuentra en la cadena");
    }
}
try{
    busqueda(cadena);
    echo ("La palabra web SI se encuentra en la cadena");
} catch (Exception $e) {
    echo $e->getMessage();
}
?>