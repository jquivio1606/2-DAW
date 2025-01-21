<?php
    function comprobarDatos($usuario, $contrasena){
        if($usuario == "usuario" && $contrasena == "8888"){
            $user['nombre']="Usuario";
            $user['rol']=0;
            return $user;
        } else if ($usuario == "admin" && $contrasena == "1234") {
            $user['nombre']="Admin";
            $user['rol']=1;
            return $user;
        } else {
            return false;
        }
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $datos = comprobarDatos($_POST['usuario'], $_POST['contrasena']);
        if ($datos == false){
            $error = true;
            $usuario = $_POST['usuario'];
        } else {
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            header("Location:sesiones1_principal.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones con formulario(Login)</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Usuario <input type="text" name="usuario" value="<?php if(isset($usuario)) echo $usuario;?>"><br>
        Contraseña <input type="text" name="contrasena">
        <input type="submit">
    </form>
</body>
</html>
