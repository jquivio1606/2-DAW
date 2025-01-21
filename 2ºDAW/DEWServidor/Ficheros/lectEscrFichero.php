<?php
    $fich=fopen("fichero_ejemplo.txt", "r");
    if($fich==false){
        echo "No se encuentra el fichero o no se pudo leer\n";
    }else{
        while (!feof($fich)){
            $valores = fscanf($fich, "%s %s %s");
            //print_r($valores);
            /*$car = fgetc($fich);
            echo $car;*/
            echo ("\n");
            foreach ($valores as $linea) {
                echo $linea." ";
            }
        }            
    }
    
    fclose($fich);
?>