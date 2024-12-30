<?php

$fich= fopen("fichero_ejemplo.txt", "r");
if($fich === FALSE){
    echo "No se encuenta \"fichero_ejemplo.txt\" \n";
} else {

    // Para que lea caracter por caracter
    echo "Leo caracter por caracter el fichero :  \n";
    while( !feof($fich) ){
        $car = fgetc($fich);
        echo $car;
    }

    //Para que lea una sola linea:
    $valores=fscanf($fich,"%s");
    foreach ($valores as $linea){
        echo "Leo solo la primera linea:  ".$linea."\n";
    }

    rewind($fich); // vuelve al principio del fichero.
    
    //Muestre todo el fichero
    echo "Leo todo el fichero linea a linea:  ";
    while( !feof($fich) ){
        $valores=fscanf($fich,"%s");
        foreach($valores as $linea){
            echo $linea."  -  ";
        }
    }
    //Leer todo el contenido del fichero de 1
    $contenido = file_get_contents("fichero_ejemplo.txt");
    echo "\nLeo todo el fichero de una vez: \n$contenido";
    
    $res =file_put_contents("fichero_salida.txt", "Fichero creado con file_puts_contents");
    
    /*
    if($res){
        echo "\nFichero creado con éxito";
    } else {
        echo "\nError al crear el fichero";
    }
        */
}

fclose($fich);

?>