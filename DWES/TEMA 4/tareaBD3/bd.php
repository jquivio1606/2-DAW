<?php

function conectar_bd(){
    try {
        $bd= new PDO("mysql:dbname=proyecto;host=127.0.0.1","root","");   
    } catch (PDOException $e){
        echo "Conexión a la base de datos \"proyecto\" fallida: ". $e->getMessage();
    }
    return $bd;
}

//Función que muestra/devuelve todos los productos (en un array) de la bd.
function mostrarProductos() {
    $bd= conectar_bd();

    $productos = $bd->query("SELECT * FROM productos");

    if ($productos->rowCount() >= 1) {
        return $productos->fetchAll(PDO::FETCH_ASSOC); 
    } else {
        return false;
    }
}

//Función que muestra/devuelve todas las familias (en un array) de la bd.
function mostrarFamilias(){
    $bd= conectar_bd();

    $familias = $bd->query("SELECT * FROM familias");

    if ($familias->rowCount() >= 1) {
        return $familias->fetchAll(PDO::FETCH_ASSOC); 
    } else {
        return false;
    }
}