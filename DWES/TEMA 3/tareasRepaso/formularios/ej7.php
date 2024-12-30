<?php /* FORMULARIO CON ARCHIVOS 2 */

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])){
    $error = $_FILES["archivo"]["error"];
    if($error === UPLOAD_ERR_OK){
        echo "Nombre del archivo: ".$_FILES["archivo"]["name"]."<br>";
        echo "Tamaño del archivo: ".$_FILES["archivo"]["size"]."<br>";
        echo "Tipo del archivo: ".$_FILES["archivo"]["type"]."<br><br>";
    } else {
        echo "Error al subir el archivo<br><br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 7</title>
</head>
<body>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="archivo"> Selecione un archivo: </label><br>
        <input type="file" name="archivo">
        <br><br>
        <input type="submit" value="Subir fichero">
    </form>
    
</body>
</html>