<?php

require "bd.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $pvp = $_POST['pvp'];
    $familia = $_POST['familia'];
    $descripcion = $_POST['descripcion'];

    if (actualizarProducto($id, $nombre, $nombre_corto, $pvp, $familia, $descripcion)) {
        header("Location: listado.php?mensaje=Producto actualizado correctamente");
        exit;
    } else {
        echo "<p>Error al actualizar el producto. Intenta nuevamente.</p>";
    }
} else {
    echo "<p>Acceso no permitido.</p>";
}
?>