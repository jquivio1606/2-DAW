<?php

function esImpar ($num){
    return ;
        
}

$num= mt_rand(0,100);

try {
    if($num%2 == 0){
        echo "El número ".$num." es par";
    } else {
        throw new Exception ("El número ".$num." es Impar");
    }
} catch (Exception $e){
    echo $e->getMessage();
}


?>