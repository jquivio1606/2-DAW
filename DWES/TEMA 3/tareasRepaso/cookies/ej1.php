<?php /* COOKIES 1 */

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['color'])) {
    $color = '';
    switch ($_POST['color']) {
        case '1':
            $color = 'lightcoral';
            break;
        case '2':
            $color = 'lightblue';
            break;
        case '3':
            $color = 'lightyellow';
            break;
    }
    setcookie("color", $color, time() + 3600 * 24); 
    header("Location: ej1.php"); 
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1: Cookies</title>
</head>
<body style="background-color: <?php echo isset($_COOKIE['color']) ? $_COOKIE['color'] : 'white'; ?>;">
    <h2> Elige el color que deseas para la web.</h2>
    <form action="./ej1.php" method="post">
        <input type="radio" name="color" id="rosita" value="1" <?php echo (isset($_COOKIE['color']) && $_COOKIE['color'] == 'lightcoral') ? 'checked' : ''; ?>>
        <label for="rosita">Rosa</label>

        <input type="radio" name="color" id="celeste" value="2" <?php echo (isset($_COOKIE['color']) && $_COOKIE['color'] == 'lightblue') ? 'checked' : ''; ?>>
        <label for="celeste">Celeste</label>

        <input type="radio" name="color" id="amarillo_clarito" value="3" <?php echo (isset($_COOKIE['color']) && $_COOKIE['color'] == 'ligthyellow') ? 'checked' : ''; ?>>
        <label for="amarillo_clarito">Amarillo</label>

        <br><br>
        <input type="submit" value="Enviar"> 

    </form>
</body>
</html>