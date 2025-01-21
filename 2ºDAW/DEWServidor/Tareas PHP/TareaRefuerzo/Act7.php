<?php
/*Actividad 7
Genera dos números al azar, entre 0 y 9. Ahora crea tres funciones, Suma, Resta y División, 
a las que les pasaremos esos valores y devolverán el resultado.
Habrá una función que controle el funcionamiento del script, de forma que a esta función le 
pasaremos como argumentos la operación a realizar y los valores.
Esta llamará a la función correspondiente, pasándole los parámetros que necesite.
Para llamar a una u otra función, es decir, para realizar una suma, resta o división, habrá que
generar un número al azar entre 0 y 3, de forma que si sale el 1 se realizará la suma, el 2 la 
resta y el 3 la división.
Habrá que controlar y generar una excepción tanto si el número al azar que se genera para 
indicar qué función vamos a realizar es el cero, como si a la división le mandamos como 
divisor el cero*/
//Claudia Ledoldis Patón

    //Generar dos números aleatorios
    $num1 = rand(0,9);
    $num2 = rand(0,9);
    echo "El primer número es: ".$num1;
    echo "\nEl segundo número es: ".$num2;

    //Funciones para sumar, restar y dividir
    function suma($num1,$num2){
        return $num1+$num2;
    }
    function resta($num1,$num2){
        return $num1-$num2;
    }
    function division($num1,$num2){
        try{
            if ($num2!=0){
                return $num1/$num2;
            }else{
                throw new Exception("\nNo se puede dividir entre 0");
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    //Generar número para la operación
    $operacion=rand(0,3);

    //Función para realizar las operaciones
    function operador($operacion,$num1,$num2){
        switch($operacion){
            case 1:
                suma($num1,$num2);
                break;
            case 2:
                resta($num1,$num2);
                break;
            case 3:
                division($num1,$num2);
                break;
            default:
                throw new Exception("No hay operación para el 0.");
                break;
        }
        
    }
    
    
?>