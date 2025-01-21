<?php //suma parametros
/*3. Escribe un fichero php (suma.php), que reciba dos parámetros y muestre la suma de ambos.
Habrá que comprobar que los argumentos se han pasado y son números.
4. Modifica el ejercicio anterior, para que los valores se pasen mediante un formulario.
Los números se introducen en un formulario, y se pasan al fichero suma.php que hace la
comprobación y muestra la suma por pantalla. */
//Claudia Ledoldis Patón

$num1= $_POST['num1'];
$num2= $_POST['num2'];

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