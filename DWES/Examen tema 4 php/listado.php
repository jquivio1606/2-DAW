<?php
require 'conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['cod'])){
        $borrar = borrar_producto($_POST['cod']);
    }
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
        <table>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cod Fabricante</th>
                <th>Acciones</th>
            </tr>
            
            <?php
                
                $productos = mostrar_productos();

                foreach ($productos as $producto) {
                    $cod_prod = $producto['codigo'];
                    $nombre = $producto['nombre'];
                    $precio = $producto['precio'];
                    $cod_fabricante = $producto['codigo_fabricante'];

                    echo "
                        <tr>
                            <td><input type='number' name='cod' value='$cod_prod'></td>
                            <td><input type='text' name='nom' value='$nombre'></td>
                            <td><input type='text' name='precio' value='$precio'></td>
                            <td><input type='number' name='cod_f' value='$cod_fabricante'></td>
                            <td>
                                <form action='' method='post'>
                                    <input type='hidden' id='id' name='cod' value='$cod_prod'>
                                    <button type='submit'>Borrar</button>
                                </form>
                                <form action='update.php' method='post'>
                                    <input type='hidden' id='id_act' value='$cod_prod'>
                                    <input type='hidden' id='update' value='actualizar'>
                                    <button type='submit'>Actualizar</button>
                                </form>
                            </td>
                        </tr>";
                }
                ?>
        </table>
    <form action="crear.php" method="post">
        <button type="submit">Crear nuevo producto</button>
    </form>
</body>
</html>