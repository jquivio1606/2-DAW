<?php //cookies2
/*2. Crea un script que permita recordar las credenciales de un usuario que se ha logeado
correctamente.
Tendremos un formulario inicial con dos campos de texto donde introducir nombre y
contraseña, y un check button que marcándolo, estaremos indicando que queremos que nos
recuerde, es decir, que guarde nuestros datos.
La próxima vez que este usuario entre en la web, mostrará los campos del formulario
rellenos con su nombre y contraseña.*/

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    if($_POST["usuario"]=="usuario" and $_POST["clave"]=="1234"){
        if (isset($_POST["recordar"])){
            setcookie('usuario', $usuario, time()+3600*24);
            setcookie('clave', $clave, time()+3600*24);
        }
        header("Location: index.html");
    } else {
        $error = true;
    }
}

$usuarioGuardado=isset($_COOKIE['usuario'])? $_COOKIE['usuario']:'';
$claveGuardada=isset($_COOKIE['clave'])? $_COOKIE['clave']:'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <?php
        if (isset($error)){
            echo "<h2>Hay algún error con los datos introducidos</h2>";
        }
    ?>
    <form method="POST">
        <label for="usuario">Usuario: </label>
        <input name="usuario" type="text" value="<?php echo $usuarioGuardado; ?>">
        <br>
        <label for="clave">Contraseña: </label>
        <input name="clave" type="password" value="<?php echo $claveGuardada; ?>">
        <br>
        <label for="recordar">Recordar datos</label>
        <input name="recordar" type="checkbox">
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>