<?php
/*  JUDIT QUIROS VIOLERO  */

define("num", 3);
define("num2", 8);

function mayorMenor ($n){
    if ($n >= 5){
       return true;
    } else {
        throw new Exception ("El número $n es menor a 5");
    }
}

try {
    // Ejemplo donde el numero sea mayor a 5
    if(mayorMenor(num2)){
        echo "El número ".num2." es mayor a 5 \n";
    }
    // Ejemplo donde el numero NO sea mayor a 5
    if(mayorMenor(num)){
        echo "El número ".num." es mayor a 5 \n";
    }
} catch (Exception $e){
    echo $e->getMessage();
}

?>