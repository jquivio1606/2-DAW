<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
</head>

<body>

    <h1> LISTADO DE PROCUCTOS </h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>familia</th>
            <th>Acciones</th>
        </tr>

        <?php
        require 'bd.php';
        $productos = mostrar_productos();
        
        foreach ($productos as $producto) {
            $id_prod = $producto['id_producto'];
            $nom_prod = $producto['nombre'];
            $precio_prod = $producto['precio'];
            $familia_prod = $producto['familia'];
            echo "
                <tr>
                    <td> $id_prod </td>        
                    <td> $nom_prod </td>
                    <td> $precio_prod </td>
                    <td> $familia_prod </td>
                        <td>
                        <a href='acciones.php?action=add'>Crear</a>
                        <a href='acciones.php?action=delete&id=$id_prod'>Borar</a>
                        <a href='acciones.php?action=update&id=$id_prod'>Editar</a>
                    </td>
                </tr>";
            }   
        ?>
    </table>
</body>

</html>