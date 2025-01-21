<?php
    require 'conexion.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo']) && isset($_POST['nombre'])&& isset($_POST['precio'])&& isset($_POST['cod_f'])){
        $cod = $_POST['codigo'];
        $nom = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cd_fabricante = $_POST['cod_f'];

        $productos= mostrar_productos();

        // Se controla si ya esta en la bd en el metodo  agregar_producto de conexion.php
        $agregar = agregar_producto($cod, $nom, $precio, $cd_fabricante);
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        
        <label for="codigo">Código</label><br>
        <input type="number" name="codigo"><br><br>

        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre"><br><br>

        <label for="precio">Precio</label><br>
        <input type="text" name="precio"><br><br>

        <label for="cod_f">Código Fabricante</label><br>
        <input type="number" name="cod_f"><br><br>

        <button type="submit"> Crear </button>
        <button type="button"> <a href="listado.php"> Volver </a> </button> 
    </form>
</body>
</html>