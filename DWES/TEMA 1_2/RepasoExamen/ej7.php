<?php

function menu ($num3, $num1, $num2) {
    $operacion;
    switch($num3){
        case 0:
            throw new Exception ("El número no puede ser 0");
        break;
        case 1:
            $operacion="La suma de ".$num1." y ".$num2." es igual a ".suma($num1,$num2);
        break;
        case 2:
            $operacion="La resta de ".$num1." y ".$num2." es igual a ".resta($num1,$num2);
        break;
        case 3:
            $operacion="La division de ".$num1." y ".$num2." es igual a ".division($num1,$num2);
        break;
    }
    return $operacion;
}

function suma ($num1, $num2){
    return $num1+$num2;
};


function resta ($num1, $num2){
    return $num1-$num2;
};


function division ($num1, $num2){
    if($num2!=0) {
        return $num1/$num2;
    } else {
        throw new Exception ("No se puede dividir entre 0");
    }
};

$num1= mt_rand(0,9);
$num2= mt_rand(0,9);
$num3= mt_rand(0,3);

try {

    echo menu($num3,$num1,$num2);


} catch (Exception $e){
    echo "ERROR: ".$e->getMessage();
}




?>