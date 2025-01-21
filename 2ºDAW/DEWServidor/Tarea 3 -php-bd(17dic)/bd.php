<?php

function conectar_bd(){
    try {
        $bd = new PDO("mysql:dbname=proyecto;host=127.0.0.1","root","");   
    } catch (PDOException $e){
        echo "Conexión a la base de datos \"proyecto\" fallida: ". $e->getMessage();
    }
    return $bd;
}

//Función que muestra/devuelve todos los productos (en un array) de la bd.
function mostrarProductos() {
    $bd = conectar_bd();

    $productos = $bd->query("SELECT * FROM productos");

    if ($productos->rowCount() >= 1) {
        return $productos->fetchAll(PDO::FETCH_ASSOC); 
    } else {
        return false;
    }
}

// Obtener un solo producto por el Id  (Para Detalles y Actualizar)
function mostrarProductoById($id) {
    $bd = conectar_bd();

    $producto = $bd->query ("SELECT * FROM productos WHERE id = $id");

    if ($producto->rowCount() == 1) {
        return $producto->fetch(); 
    } else {
        return false;
    }

}

//Obtener el nombre de la familia por el codigo  (Para Detalles)
function mostrarNombreFamiliaByCod($codigo) {
    $bd = conectar_bd();

    $nomFamilia = $bd->query("SELECT nombre FROM familias WHERE cod LIKE '$codigo'");

    if ($nomFamilia->rowCount() >= 1) {
        return $nomFamilia->fetch(); 
    } else {
        return false;
    }
    
}


//Función que muestra/devuelve todas las familias (en un array) de la bd.  (Para crear y actualizar)
function mostrarFamilias(){
    $bd = conectar_bd();

    $familias = $bd->query("SELECT * FROM familias");

    if ($familias->rowCount() >= 1) {
        return $familias->fetchAll(PDO::FETCH_ASSOC); 
    } else {
        return false;
    }
}

//Función que borra el producto seleccionado mediante el id
function borrarProducto($id){
    $bd = conectar_bd();
    
    $delete = $bd ->query("DELETE FROM productos WHERE id = $id");
    
    if ($delete->rowCount() == 1) {
        return true;
    } else {
        return false;
    }

}