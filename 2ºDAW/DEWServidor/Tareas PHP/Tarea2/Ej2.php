<?php
//Claudia Ledoldis Patón
/*2. Guarda en una variable de tipo cadena tu nombre y apellidos separados por el símbolo *. A
continuación, crea una lista con los elementos nombre, apellido1 y apellido2, y pasale los
valores de la lista. Por último, imprime por pantalla los valores de la lista por separado, y
luego en una misma línea.*/

$datos = "Claudia*Ledoldis*Paton";

list($nombre, $apellido1, $apellido2) = explode("*", $datos);

echo "$nombre\n";
echo "$apellido1\n";
echo "$apellido2\n";

echo "$nombre $apellido1 $apellido2";

/*3. Indica las diferencias que hay entre un array y una lista en PHP. (La solución a esta actividad
la puedes incluir como comentario en el fichero php del ejercicio 2).

Las diferencias entre array y lista son que los arrays guardan los valores asociados a una posición dentro del array,
y la lista guarda los valores en variables independientes.*/
?>
