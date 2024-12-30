<?php

    function comprobar($usuario, $contrasena){
       
        if($usuario == "usuario" && $contrasena == "1234"){
            $users["nombre"] = $usuario; 
            $users["rol"] = 0; 
            return $users;


        } else if ($usuario == "admin" && $contrasena == "1234"){
            $users["nombre"] = $usuario; 
            $users["rol"] = 1; 
            return $users;

        } else {
            return false;
        }
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $infoSesion = comprobar($_POST["usuario"], $_POST["contrasena"]);
        
        if ($infoSesion == false){
            $error= true;                        
            $usuario= $_POST['usuario'];
        } else {
            session_start();
            $_SESSION['usuario']= $_POST['usuario'];  
            header("Location: sesiones1_principal.php");
            
        }      
    }
        
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones Login</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
        <label> Nombre de Usuario: </label>
        <br>
        <input name="usuario" type="text" value= "<?php if(isset($usuario)) {echo $usuario;} ?>">
        <br>
        <br>
        <label> Contraseña: </label>
        <br>
        <input name="contrasena" type="password" >
        <br>
        <input style="margin:10px; margin-left: 57px;" type="submit">
    </form>  
</body>
</html>


