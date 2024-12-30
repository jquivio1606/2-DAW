<?php /* FORMULARIO CON ARCHIVO 1*/
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_FILES["archivo"])){
            echo "Nombre del fichero: ".$_FILES["archivo"]["name"]."<br>";
            echo "Nombre temporal del fichero: ".$_FILES["archivo"]["tmp_name"]."<br>";
        } else {
            echo "No se ha subido ningún fichero";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    
    <form action="./ej6.php" method="post" enctype="multipart/form-data">
        <label for="archivo"> Selecione un archivo: </label><br>
        <input type="file" name="archivo">
        <br><br>
        <input type="submit" value="Subir fichero">
    </form>
</body>
</html>