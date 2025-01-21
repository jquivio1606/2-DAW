<?php
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$clave = '';

try{
    //Conectar
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    echo "Conexión realizada con éxito<br>";
    $preparada = $bd->prepare("INSERT INTO usuarios (nombre,clave,rol) VALUES (?, ?, ?)");
    $preparada->execute(array("Pepe",1234,"1111"));
    
}catch  (PDOException $e){
    echo 'Error con la base de datos: '.$e->getMessage();
}
?>