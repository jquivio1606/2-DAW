<?php //subida fichero
/*7. Crea un formulario que permita subir un fichero al servidor. Una vez subido, habrá que
comprobar que efectivamente se ha subido un archivo, y mostrar información relativa a su
nombre, tamaño y el tipo. Si se ha producido un error durante la subida, mostrar este. Habrá
que crear una función para tratar el error, y en función de su número.
Todo se hará en el mismo fichero.*/


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_FILES['fichero'])){
        $nomCliente=$_FILES['fichero']["name"];
        $tamanio= $_FILES['fichero']["size"];
        $tipo= $_FILES['fichero']['type'];
        
        echo "Nombre del fichero: ".$nomCliente;
        echo "<br>Tamaño: ".$tamanio;
        echo "<br>Tipo: ".$tipo;
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario subir fichero</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label for="fichero">Elige el fichero: </label>
        <input name="fichero" type="file">
        <br>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>