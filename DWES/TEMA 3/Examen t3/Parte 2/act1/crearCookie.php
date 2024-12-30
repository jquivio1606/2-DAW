<?php 
    /*  JUDIT QUIRÓS VIOLERO  */


    // Crea la cookie con el valor del formulario, y que dure 1 día.

    setcookie("idioma", $_POST["idioma"], time() + 3600*24 ); 

    // Se vuelve a la página donde se seleciona el idioma
    header("Location: ./act1.php")

?>