<?php

$conexion= 'mysql:dbname=empresa;host=127.0.0.1';

try {
    $bd = new PDO($conexion,'root', '');
    echo "* Conexion realizada con exito  *\n";
    
    // Hacer un SELECT NORMAL
    $usuarios = $bd->query("SELECT nombre, contraseña, rol FROM usuarios");
        
    // Hacer un select con una condicion
    $usuarios2 = $bd->query("SELECT * FROM usuarios WHERE rol=0");

    print "\n----------------------SELECT * FROM usuarios-----------------------\n";
    foreach($usuarios as $row){
        print $row['nombre']."\t\t";
        print $row['contraseña']."\t";
        print $row['rol']."\t";
        print "\n";
    }   
    echo "Cantidad de filas: ".$usuarios->rowCount()."\n"; // Cuenta cuantas filas salen en la sentencia    

    // Hacer una consulta que espere recibir un valor por parametro.
    $preparada= $bd->prepare("SELECT * FROM usuarios WHERE rol = ?");
    $preparada->execute(array(0));


    print "\n---------------SELECT * FROM usuarios WHERE rol = ?----------------\n";
    foreach($preparada as $row){
        print $row['nombre']."\t\t";
        print $row['contraseña']."\t";
        print $row['rol']."\t";
        print "\n";
    } 

    // Hacer una consulta que espere recibir dos valores por parametro.
    $preparada2= $bd->prepare("SELECT * FROM usuarios WHERE rol = ? and nombre = ?");
    $preparada2->execute(array(1, "Judit"));


    print "\n-------SELECT * FROM usuarios WHERE rol = ? and nombre = ?---------\n";
    foreach($preparada2 as $row){
        print $row['nombre']."\t\t";
        print $row['contraseña']."\t";
        print $row['rol']."\t";
        print "\n";
    }; 

   
 

    // INSERTAR DATOS en la tabla
    $preparado= $bd->prepare("INSERT INTO usuarios (nombre,contraseña,rol) VALUES (?,?,?); ");
    $preparado->execute(array("Juan","5432",0));

    $select = $bd->query("SELECT * FROM usuarios");
    print "\n----INSERT INTO usuarios (nombre,contraseña,rol) VALUES (?,?,?)----\n";
    foreach($select as $row){
        print $row['nombre']."\t\t";
        print $row['contraseña']."\t";
        print $row['rol']."\t";
        print "\n";
    }  
    
    
   // BORRAR FILA DE LA TABLA
    $preparado= $bd->prepare("DELETE FROM usuarios WHERE nombre = ? and contraseña = ?; ");
    $preparado->execute(array("Juan","5432"));

    $select2 = $bd->query("SELECT * FROM usuarios");
    print "\n-----DELETE FROM usuarios WHERE nombre = ? and contraseña = ?------\n";
    foreach($select2 as $row){
        print $row['nombre']."\t\t";
        print $row['contraseña']."\t";
        print $row['rol']."\t";
        print "\n";
    } 

    // ACTUALIZAR Datos 
    $preparado= $bd->prepare("UPDATE usuarios SET rol= ? WHERE rol = ? and nombre = ?; ");
    $preparado->execute(array(1,0,"Pepe"));

    $select3 = $bd->query("SELECT * FROM usuarios WHERE nombre = 'Pepe'");
    print "\n------UPDATE usuarios SET rol= ? WHERE rol = ? and nombre = ?------\n";
    foreach($select3 as $row){
        print $row['nombre']."\t\t";
        print $row['contraseña']."\t";
        print $row['rol']."\t";
        print "\n";
    } 

    // Lo vuelvo a poner como estaba
    $preparado= $bd->prepare("UPDATE usuarios SET rol= ? WHERE rol = ? and nombre = ?; ");
    $preparado->execute(array(0,1,"Pepe"));

    print "\n";
    //$bd-> close();
} catch (Exception $e){
    echo "Error en la base de datos: " + $e->getMessage();
}


?>