<?php
function conectar_bd(){
    try {

        $bd = new PDO("mysql:dbname=tienda;host=127.0.0.1","root","");
        return $bd;

    }catch (PDOException $e){
        echo "Conexion a la base de datos 'tienda' fallida: ".$e->getMessage();
    }
}

// METODOS DE LA BD
function mostrar_productos(){
    $bd = conectar_bd();

    $productos = $bd->query('SELECT * FROM producto');

    if($productos->rowCount() >= 1){
        return $productos->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function agregar_producto ($cd,$nom,$precio,$cd_f){
    $bd = conectar_bd();

    try{
        $crear = $bd->query("INSERT INTO producto VALUES ('$cd','$nom','$precio','$cd_f')");

    } catch (PDOException $e){
        echo "No se ha ingresado el producto. El producto que se quiere ingresar ya esta en la base de datos";
    }

}

function borrar_producto ($id) {
    $bd = conectar_bd();

    $delete = $bd->query("DELETE FROM producto WHERE codigo='$id'");
    if($delete->rowCount() == 1){
        return true;
    }
}

?>