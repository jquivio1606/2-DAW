<?php
//Claudia Ledoldis Patón
/* 8. Si asignamos una variable el valor de otra que no se ha inicializado o no existe, se genera
un error. Captura dicho error con la función predefinida set_error_handler, y crea una función que 
permita indicar de qué error se trata, mostrando información sobre el número de error.*/

function manejadorErrores($errno, $str){
    echo "Variable no inicializada. Error: ".$errno;
}
set_error_handler("manejadorErrores");
$a= $b;

?>