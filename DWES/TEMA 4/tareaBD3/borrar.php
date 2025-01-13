<?php

require "bd.php";

if (isset($_GET['id'])) {
    $id_prod = $_GET['id'];

    if (borrarProducto($id_prod)) {
        $mensaje = "El producto con ID $id_prod ha sido eliminado correctamente.";
    } else {
        $mensaje = "Error: No se pudo eliminar el producto. Verifica si existe o intenta nuevamente.";
    }
} else {
    $mensaje = "No se recibió un ID válido para eliminar.";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="width: 70%; margin: auto; background-color: rgb(140, 202, 226);">
    <br><br>
    <h2 class="text-center">ELIMINACIÓN DE PRODUCTO</h2><br><br>
    <div class="alert alert-info text-center">
        <p><?php echo $mensaje; ?></p>
    </div>
    <a href="listado.php" class="btn btn-primary"> Volver </a>
</body>

</html>