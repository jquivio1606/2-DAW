<?php



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Listado </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="width: 70%; margin: auto; background-color: rgb(140, 202, 226);">
    <br><br>
    <h2 class="text-center"> GESTIÓN DE PRODUCTOS </h2><br><br>
    <form action="crear.php" method="">
        <button type="submit" class="btn btn-success" style="margin-bottom: 5px;">Crear</button>
    </form>
    <table class="table table-dark table-striped" style="align-content: center; text-align: center; ">
        <thead>
            <tr>
                <th>Detalle</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require 'bd.php';
                $productos= mostrarProductos();

                if($productos == false){
                    echo "<p> Error al conectar con la base de datos</p>";
                }

                foreach($productos as $producto){
                    $id_prod = $producto['id'];
                    $nom_prod = $producto['nombre'];

                    echo "<tr>
                            <td>
                                <form action='detalle.php' method='get'>
                                    <button type='submit' class='btn' style='color: white; background-color: rgb(24, 152, 161);'>Detalle</button> 
                                </form>
                            </td>
                            <td> $id_prod </td>
                            <td> $nom_prod </td>
                            <td>
                                <form action='update.php' method='get' style='display: inline'>
                                    <button type='submit' class='btn btn-warning'>Actualizar</button>
                                </form>
                                <form action='borrar.php' method='post' style='display: inline'>
                                    <button type='submit' class='btn btn-danger'>Borrar</button>
                                </form>
                            </td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>
</body>

</html>