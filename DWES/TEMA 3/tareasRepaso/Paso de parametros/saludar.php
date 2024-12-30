<?php

    //http://localhost:3000/TEMA%203/tareasRepaso/saludar.php?nombre=Judit

    echo "Actividad 1 <br>";
    echo "Hola ".$_GET["nombre"]."!!<br>";

    // Act 2
    echo "Actividad 2 <br>";
    if(empty($_GET["nombre"]) || is_null($_GET["nombre"])){ // También se puede poner isset que es si esta inicializada
        echo "No se ha mandado ningun nombre";
    } else {
        echo "Hola ".$_GET["nombre"]."!!<br>";
    }

?>