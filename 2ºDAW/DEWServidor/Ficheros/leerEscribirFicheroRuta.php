<?php
    $contenido = file_get_contents("fichero_ejemplo.txt");
    echo "Contenido del fichero: $contenido";

    $res = file_put_contents("fichero_salida.txt", "\nFichero creado con file_put_contents");
    if($res){
        echo "Fichero creado con éxito";
    }else{
        echo "Error al crear el fichero";
    }
?>