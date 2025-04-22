<?php
require "bd.php";

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $pvp = $_POST['pvp'];
    $familia = $_POST['familia'];
    $descripcion = $_POST['descripcion'];

    // Llamar a la función de creación de productos
    if (crearProducto($nombre, $nombre_corto, $pvp, $familia, $descripcion)) {
        echo "<div class='alert alert-success'>Producto creado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al crear el producto.</div>";
    }
}

// Obtener las familias para el formulario
$familias = mostrarFamilias();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="width: 70%; margin: auto; background-color: rgb(140, 202, 226);">
    <br><br>
    <h2 class="text-center">CREAR PRODUCTO</h2><br><br>

    <form action="crear.php" method="POST">
        <div class="row mb-3">
            <div class="col-md-6">

                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">
                <label for="nombre_corto" class="form-label">Nombre corto</label>
                <input type="text" name="nombre_corto" class="form-control" placeholder="Nombre corto" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="pvp" class="form-label">Precio (€)</label>
                <input type="number" step="0.01" name="pvp" class="form-control" placeholder="Precio (€)" required>
            </div>
            <div class="col-md-6">
                <label for="familia" class="form-label">Familia</label>
                <select name="familia" class="form-control" required>
                    <?php foreach ($familias as $familia): ?>
                        <option value="<?php echo htmlspecialchars($familia['cod']); ?>">
                            <?php echo htmlspecialchars($familia['nombre']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-10">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" cols="70" rows="10" class="form-control" required></textarea>
        </div>
        <br><br>

        <button type="submit" class="btn btn-success me-2">Crear</button>
        <a href="listado.php" class="btn btn-primary"> Volver </a>

    </form>
</body>

</html>