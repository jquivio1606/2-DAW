<?php

require "bd.php";

if (isset($_GET['id'])) {
    $id_prod = $_GET['id'];

    if (mostrarProductoById($id_prod)) {
        $producto = mostrarProductoById($id_prod);
    } else {
        $mensaje = "Error: No se pudo mostrar el detalle del producto. Verifica si existe o intenta nuevamente.";
    }
} else {
    $mensaje = "No se recibió un ID válido para eliminar.";
}
$familias = mostrarFamilias();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="width: 70%; margin: auto; background-color: rgb(140, 202, 226);">
    <form>
        <label for="nombre">Nombre</label><br>
        <input type="text" value="<?php echo $producto['nombre'];?>"><br>
        <label for="nombre_corto">Nombre corto</label><br>
        <input type="text" value="<?php echo $producto['nombre_corto'];?>"><br>
        <label for="nombre">Precio (€)</label><br>
        <input type="text" value="<?php echo $producto['pvp'];?>"><br>
        <label for="nombre">Familia</label><br>
        <select name="familia">
            <?php
            if ($familias) {
                foreach ($familias as $familia) {
                    // Comprobamos si el código de la familia coincide con la del producto
                    $selected = ($producto['familia'] == $familia['cod']) ? 'selected' : '';
                    echo "<option value='{$familia['cod']}' $selected>{$familia['nombre']}</option>";
                }
            } else {
                echo "<option value=''>No hay familias disponibles</option>";
            }
            ?>
        </select><br>
        <label for="nombre">Descripcion</label><br>
        <textarea cols="70px" rows="10px"><?php echo $producto['descripcion'];?></textarea><br>
        <button type="submit" class="btn btn-success" style="margin-bottom: 5px;">Actualizar</button>
        <button type="reset" class="btn btn-success" style="margin-bottom: 5px;">Limpiar</button>
        <form action="listado.php" method="">
            <button type="submit" class="btn btn-success" style="margin-bottom: 5px;">Volver</button>
        </form>

    </form>
</body>

</html>