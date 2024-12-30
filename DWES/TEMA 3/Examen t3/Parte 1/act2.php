<?php
    /* JUDIT QUIRÓS VIOLERO */
    
    //Método para coomprobar si el archivo subido en un pdf o no.
    function tipoArchivo($tipo){
        if($tipo=="application/pdf"){
            return true;
        } else {
            return false;
        }
    }
    
    //Método para comprobar que tipo de error es, y devuelve el mensaje de error correspondiente.
    function comprobarError($error){
        $mensaje="";
        switch($error){
            case  0:
                $mensaje = "No hay error, fichero subido con éxito.";
            break;
            case  1:
                $mensaje = "El fichero subido excede la directiva upload_max_filesize de php.ini.";
            break;
            case  2:
                $mensaje = "El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML";
            break;
            case  3:
                $mensaje = "El fichero fue sólo parcialmente subido.";
            break;
            case  4:
                $mensaje = "No se subió ningún fichero";
            break;
            case  6:
                $mensaje = "Falta la carpeta temporal.";
            break;
            case  7:
                $mensaje = "No se pudo escribir el fichero en el disco.";
            break;
            case  8:
                $mensaje = "Una extensión de PHP detuvo la subida de ficheros";
            break;
        }
        return $mensaje;
    }

       
    //Comprueba si se ha mandado algo del formulario
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Comprueba si se ha subido el archivo correctamente. Si no, muestra un mensaje de error.
        if (is_uploaded_file($_FILES["archivo"]["tmp_name"])){
            //Llama al método para comprobar si el archivo es un pdf o no. Si no lo es muestra el mensaje de error.
            if (tipoArchivo($_FILES["archivo"]["type"])) {
                echo "Archivo subido con éxito.";
            } else {
                echo "El archivo enviado no es de tipo PDF";
            }
        } else {
            echo "Error: ".comprobarError($_FILES["archivo"]["error"]);
        }
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Actividad 2 </title>
</head>
<body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <br><br>
            <label for="archivo"> Sube un documento PDF: </label>
            <input type="file" name="archivo" accept="application/pdf"><br><br>
            <input type="submit" value="Enviar">
        </form>
</body>
</html>