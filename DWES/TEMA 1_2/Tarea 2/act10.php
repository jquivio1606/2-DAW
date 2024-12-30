<?php
/*  JUDIT QUIROS VIOLERO  */

$cadena="Desarrollo de aplicaciones web";
$cadena2="Desarrollo de aplicaciones multiplataforma";

function busqueda($cad){
    if(strpos($cad,"web")){
        return true;
    } else {
        throw new Exception ("La cadena \" $cad \" no contiene la palabra \" WEB \" ");
    }
}

try {
    //Ejemplo donde la cadena contenga la palabra Web
    if(busqueda($cadena)){
        echo "La cadena \" $cadena \" contiene la palabra \" WEB \" \n";
    }
    //Ejemplo donde la cadena NO contenga la palabra Web
    if(busqueda($cadena2)){
        echo "La cadena \" $cadena2 \" no contiene la palabra \" WEB \" \n";
    }
    
} catch (Exception $e){
    echo $e->getMessage();
}

?>