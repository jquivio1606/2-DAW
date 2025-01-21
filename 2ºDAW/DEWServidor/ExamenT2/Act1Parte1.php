<?php
/*Claudia Ledoldis Patón
Actividad 1 (5 puntos)
Crea un formulario en el que se introducirán dos números y realizará la división del primero por el
segundo, mostrando el resultado por pantalla. Esto lo hará la función ‘dividir’, que estará en el
mismo fichero, y que tomará dos parámetros y devolverá el resultado.
En el mismo fichero también se debe comprobar:
1. Que se han enviado los datos y estos no se han dejado en blanco
2. Si ambos son números y el segundo valor, el dividendo, es distinto de cero.
De ser correcto, mostrará el resultado de la operación por pantalla. En caso contrario
mostrará un mensaje de error.*/

//Comprobamos si se han inicializado las variables, si es así, guardamos los datos en las variables locales
if(isset($_POST['num1']) && isset($_POST['num2'])){
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];

//Comprobamos si las variables son números 
if (is_numeric($num1)&&is_numeric($num2)){

    //Si el segundo número es distinto de 0 se realiza la división
    if ($num2 !=0){
        echo "La división de $num1 entre $num2 es : ".dividir($num1,$num2);
    //En caso contrario, si el segundo número es 0, sale un mensaje de error.
    } else{
        echo "El segundo número no puede ser 0.";
    }
}else{
    echo "Los valores introducidos tienen que ser números.";
}
}
//Función para dividir
function dividir($num1,$num2) {
    return $num1/$num2;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>
<body>
<!--Formulario para introducir los datos-->
    <form method="POST">
        <label for="num1">Introduce el primer número</label>
        <input type="number" name="num1">
        <br>
        <label for="num2">Introduce el segundo número</label>
        <input type="number" name="num2">
        <br>
        <input type="submit" value="Hacer división">
    </form>
    
</body>
</html>