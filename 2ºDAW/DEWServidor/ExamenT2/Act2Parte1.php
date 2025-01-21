<?php
/*Claudia Ledoldis Patón
Actividad 2 (5 puntos)
Crea un formulario que permita subir un documento PDF al servidor, tras pulsar el botón ‘enviar’.
Habrá que hacer algunas comprobaciones, en el mismo archivo php:
1. Que se sube correctamente. Para ello debes comprobarlo con is_uploaded_file($_FILES[]
[]). En el caso de que no, habrá que mostrar el error que se ha producido, mostrando este por
pantalla. Para ello crearemos la función comprobar Error. Los valores que puede tomar son:
a) 0; No hay error, fichero subido con éxito.
b) 1; El fichero subido excede la directiva upload_max_filesize de php.ini.
c) 2; El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario
HTML.
d) 3; El fichero fue sólo parcialmente subido.
e) 4; No se subió ningún fichero.
f) 6; Falta la carpeta temporal.
g) 7; No se pudo escribir el fichero en el disco.
h) 8; Una extensión de PHP detuvo la subida de ficheros.*/

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    function tipoArchivo($tipo)
    {
        if ($tipo == "application/pdf")
            return true;
        else
            return false;
    }
    //Función para comprobar los errores
    function comprobarError($error)
    {
        switch ($error) {
            case 0:
                echo "No hay error, fichero subido con éxito.";
                break;
            case 1:
                echo "El fichero subido excede la directiva upload_max_filesize de php.ini.";
                break;
            case 2:
                echo "El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.";
                break;
            case 3:
                echo "El fichero fue sólo parcialmente subido.";
                break;
            case 4:
                echo "No se subió ningún fichero.";
                break;
            case 6:
                echo "Falta la carpeta temporal.";
                break;
            case 7:
                echo "No se pudo escribir el fichero en el disco.";
                break;
            case 8:
                echo "Una extensión de PHP detuvo la subida de ficheros.";
                break;
            default;
                break;
        }
    }
    $nombreArchivo = $_FILES['archivo']['name'];
    echo "El archivo es: $nombreArchivo";
    //Comprobamos si el fichero se ha subido correctamente o no y muestra un mensaje
    if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
        if (tipoArchivo($_FILES["archivo"]["type"])) {
            $error = $_FILES['archivo']['error'];
            echo "<br>Número de error: $error<br>";
            comprobarError($error);
        }
    } else {
        $error = $_FILES['archivo']['error'];
        echo "<br>Número de error: $error<br>";
        comprobarError($error);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2</title>
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <label for="archivo">Elige un documento PDF: </label>
        <input type="file" name="archivo" accept="application/pdf">
        <br>
        <input type="submit">
    </form>

</body>

</html>