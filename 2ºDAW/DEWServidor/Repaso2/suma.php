<?php //suma
/*3. Escribe un fichero php (suma.php), que reciba dos parámetros y muestre la suma de ambos.
Habrá que comprobar que los argumentos se han pasado y son números. */
//Claudia Ledoldis Patón

$num1= $_GET["num1"];
$num2= $_GET["num2"];

if ((empty($num1))||(empty($num2))){
    echo "Los valores no se han introducido correctamente";
}else if((is_numeric($num1))&&(is_numeric($num2))){
    echo "La suma de {$num1} y {$num2} es: ".suma($num1,$num2);
}else{
   echo "Debes introducir dos números enteros.";
}
function suma($num1,$num2){
    return $num1+$num2;
}
?>