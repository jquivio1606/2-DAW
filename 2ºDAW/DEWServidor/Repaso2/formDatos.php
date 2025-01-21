<?php //formulario datos
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["usuario"]=="usuario" and $_POST["clave"]=="1234"){
        header("Location: index.html");
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<!--5. Crea un formulario en el que se introducirá usuario y contraseña. En el mismo fichero se
comprobará si estos son correctos y en ese caso mandará a la página index.html, (no es
necesario crearla), en caso contrario generará un error (pondrá la variable $error a true).
En el formulario se deberá comprobar si la variable error ha sido inicializada, es decir,
contiene un valor, y si es así, indicar con un mensaje que ha ocurrido algún error.-->
<body>
    <?php
        if (isset($error)){
            echo "<h2>Hay algún error con los datos introducidos</h2>";
        }
    ?>
    <form method="POST">
        <label for="usuario">Usuario: </label>
        <input name="usuario" type="text">
        <br>
        <label for="clave">Contraseña: </label>
        <input name="clave" type="password">
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>