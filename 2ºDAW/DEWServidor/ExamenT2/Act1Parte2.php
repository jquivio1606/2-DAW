<?php
/*Claudia Ledoldis Patón
Actividad 1 (3,5 puntos)
1. Crea un script que permita indicar el idioma en el que se quiere ver la web, de forma que la
próxima vez que el usuario acceda a dicho site, la muestre en el idioma elegido.
La elección del idioma se realizará en un formulario, en el que tendremos varias opciones
(radio buttons) para elegirlo. Esta elección será enviada a un archivo php donde se creará
una cookie con dicha información. Una vez creada, se devolverá el flujo de control al
fichero desde el que se llamó al script, donde se comprobará que la cookie ha sido creada y
el idioma elegido, que hemos guardado en esta, y redirigirá a un index_es.php o
index_en.php, en función de si se eligió el idioma Español o Inglés.
Recuerda que si pones en el formulario ‘radio buttons’, hay que marcar uno por defecto, que
en este caso será el de la opción en Español. Esto se hace mediante la propiedad ‘checked’,
por ejemplo: <input type = "radio" name = "idioma" value = "5" checked> Esto indica que
este es el que estará marcado.
Esto lo haremos al principio de nuestro script, para que ya aparezca uno marcado. Ten en
cuenta que si ya ha entrado anteriormente en la web y ha elegido un idioma, habrá que
comprobarlo igualmente, para que no quede marcada la opción por defecto, y que esta no
coincida con la elección del usuario.*/

if (isset($_COOKIE['idioma'])) {
    $idioma = $_COOKIE['idioma'];
    if ($idioma == "spanish") {
        header("Location: index_es.php");
    } elseif ($idioma == "english") {
        header("Location: index_en.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1 Parte 2</title>
</head>

<body>
    <form action="./crearCookie.php" method="POST">
        <label for="idioma">Español</label>
        <input type="radio" name="idioma" value="spanish" checked>
        <label for="idioma">Inglés</label>
        <input type="radio" name="idioma" value="english">
        <br>
        <input type="submit">

</body>

</html>