<?php
/*  JUDIT QUIROS VIOLERO  */

function menu ($operacion= 1, $a, $b){
    $result = 0;
    switch($operacion){
        case 1:
            $result= suma($a,$b);
        break;
        case 2:
            $result= resta($a,$b);
        break;
        case 3:
            $result= multiplicacion($a,$b);
        break;
    }
        
    return $result;
}

function suma ($a, $b){
    return $a+$b;
}

function resta ($a, $b){
    return $a-$b;
}

function multiplicacion ($a, $b){
    return $a*$b;
}

echo "\nEl resultado de la suma es: ".menu(1,2,3);
echo "\nEl resultado de la resta es: ".menu (2,5,2);
echo "\nEl resultado de la multiplicacion es: ".menu(3,4,2);
?>