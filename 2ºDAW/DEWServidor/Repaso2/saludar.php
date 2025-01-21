<?php //saludar
/*1. Crea un archivo php (saludar.php) que nos salude al solicitar al servidor dicho archivo.
Habrá que pasar en la url los parámetros ‘nombre’ y tu nombre, de forma que al acceder a
dicho archivo a través del servidor, nos salude con el nombre que hemos pasado.
Habrá que indicar la ruta a dicho archivo.php así como el parámetro que le pasamos.*/
//Claudia Ledoldis Patón

echo "Ejercicio 1.- ";
echo "Hola ".$_GET["nombre"];

/*2. Modifica el ejercicio anterior para comprobar si se ha pasado el parámetro ‘nombre’, de
forma que si no se ha pasado muestre un mensaje indicando que no se ha introducido el
nombre, y en caso contrario, un mensaje de saludo.*/

echo "<br>Ejercicio 2.- ";
if (empty($_GET["nombre"])){
    echo "Error, falta nombre";
}else{
    echo "Hola ".$_GET["nombre"];
}
?>