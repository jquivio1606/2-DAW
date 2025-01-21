<?php
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$clave ='';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    echo "Conexión realizada con éxito<br>";
    $sql = 'SELECT nombre, clave, rol FROM usuarios WHERE rol=8888';
    $usuarios = $bd->query($sql);
    echo "\nNúmero de usuarios: ".$usuarios->rowCount()."\n\n<br>";
    echo "Usuario\t Clave\t Rol\n<br>";
    foreach($usuarios as $row){
        print $row['nombre']."\t";
        print $row['clave']."\t";
        print $row['rol']."\t\n<br>";
    }

    $preparada = $bd->prepare("SELECT nombre, rol FROM usuarios WHERE rol = ? and nombre = ?");
    $preparada->execute(array(8888, "admin"));
    echo "Usuarios con rol 8888 y nombre de usuario admin: ".$preparada->rowCount()."<br>";
    foreach($preparada as $usu){
        print "Nombre: ".$usu['nombre'].", rol: ".$usu['rol']."<br>";
    }
    //$bd->close();
} catch (PDOException $e){
        echo 'Error con la base de datos: '.$e->getMessage();
}