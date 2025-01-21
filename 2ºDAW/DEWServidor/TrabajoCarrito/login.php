<?php
$msg_error = '';
$envio_formulario = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $envio_formulario = true;

    if (empty($_POST["usuario"]) || empty($_POST["passwd"])) {
        $msg_error = "Introduzca sus datos por favor";
    } else {
        $usuario = $_POST["usuario"];
        $passwd = $_POST["passwd"];
        if ($usuario == "usuario" && $passwd == "usuario") {
            session_start();
            $_SESSION["usuario"] = $usuario;
            $_SESSION["passwd"] = $passwd;
            header("Location: index.php");
            exit();
        } else {
            $msg_error = "Datos incorrectos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
    <div class="container">
        <?php
        if ($envio_formulario && !empty($msg_error)) {
            echo "<div class='alert alert-danger'>$msg_error</div>";
        }
        ?>
        <form method="POST">
            <div class="form-control">
                <label for="usuario" class="form-label">Nombre: </label>
                <input type="text" id="usuario" name="usuario" class="form-control" value="<?php echo isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : ''; ?>"><br>
                <label for="passwd" class="form-label">Contraseña: </label>
                <input type="password" id="passwd" name="passwd" class="form-control"><br>
            </div><br>
            <input type="submit" value="Enviar" class="btn btn-secondary">
        </form>
    </div>
</body>
</html>
