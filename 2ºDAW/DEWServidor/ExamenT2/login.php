<?php
/*Claudia Ledoldis Patón
Actividad 2 (4,5 puntos)
Crea un programa en PHP que permita cambiar la contraseña al usuario.
El programa constará de diferentes archivos:
1. Login.php, donde tendremos un formulario en el que introducir usuario y contraseña.
Lo primero que haremos será comprobar si hay una sesión activa, en cuyo caso la
destruiremos, así como las cookies que pudiese haber. Recuerda que no es necesario que
exista la cookie para destruirla.
En este mismo, en una función, se comprobará que tanto el usuario como la contraseña son
correctos (usuario= ‘user’, contraseña= ‘abcd’).
Si todo es correcto, crearemos una sesión y nos redirigirá a cambPass.php. En caso
contrario, mensaje de error y permanecemos en esta página.
2. CambPass.php, comprobará si la sesión existe, en caso contrario, redirigirá a login.php.
En este se mostrará un formulario con dos campos de texto, uno donde el usuario introducirá
la contraseña actual, y otro la nueva. Este último debe mostrarse con asteriscos.
En este se debe comprobar que la contraseña coincide con la que ha introducido en
login.php (‘abcd’). Ojo, no comprobar con la cadena ‘abcd’. Eso ya lo hicimos en login.php.
Si coincide, guardar la nueva contraseña, en caso contrario, mostrar mensaje error.
Además, el formulario tendrá dos enlaces:
a) uno que nos lleva a salir.php.
b) Otro que nos lleva a login.php.
3. Salir.php, destruirá la sesión y la cookie, y nos redirige a login.php.*/
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
    session_destroy();
}

//Función para comprobar los datos
function comprobarDatos($usuario,$clave)  {    
    if ($usuario == "user" && $clave == "abcd") {
        session_start();
        $_SESSION['user'] = $usuario;
        $_SESSION['pass'] = $clave;
        header("Location: ./cambPass.php");
    } else {
        echo "Datos incorrectos.";
    }
}    

if ($_SERVER['REQUEST_METHOD'] == "post") {
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $usuario = $_POST['user'];
        $clave = $_POST['pass'];
        comprobarDatos($usuario,$clave);
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="login.php" method="post">
        <label for="user">Usuario: </label>
        <input type="text" name="user">
        <label for="pass">Contraseña: </label>
        <input type="password" name="pass">
        <br>
        <input type="submit">
    </form>

</body>

</html>