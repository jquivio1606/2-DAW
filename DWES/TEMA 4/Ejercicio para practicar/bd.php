<?php
function conectar_BD (){
    $conexion = 'mysql:dbname=tienda;host=127.0.0.1';
    try{
        $bd=new PDO($conexion, 'root','');
        echo 'Conexión realizada con éxito';
        return $bd;
    }catch (PDOException $e){
        echo 'Error al conectar con la base de Datos'.$e->getMessage();
    }
}


function mostrar_productos (){
    $bd = conectar_BD();

    $productos = $bd->query('SELECT * FROM productos');

    if($productos->rowCount() >= 1){
        return $productos->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function mostrar_productos_por_id ($id){
    $bd = conectar_BD();

    $producto = $bd->prepare('SELECT * FROM productos WHERE id = ?');
    $producto->execute(array('$id'));

    if($producto->rowCount() == 1){
        return $producto->fetch(PDO::FETCH_ASSOC);
    } else{
        return false;
    }
}

function crear_producto (){
    $bd = conectar_BD();

    $productos = $bd->query('SELECT * FROM productos');

    if($productos->rowCount() >= 1){
        return $productos->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}
function actualizar_producto (){
    $bd = conectar_BD();

    $productos = $bd->query('SELECT * FROM productos');

    if($productos->rowCount() >= 1){
        return $productos->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

?>