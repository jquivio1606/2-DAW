<?php
/*    ACTIVIDAD 3   */

// 1 .Conectar a la base de datos:
try {
    $bd= new PDO("mysql:dbname=proyecto;host=127.0.0.1","root","");  


} catch (PDOException $e){
    echo "Conexión a la base de datos \"proyecto\" fallida: ". $e->getMessage();
}

// 2 .Empezar la transacción
try {
               
    $bd->beginTransaction();

    $query = $bd->query("UPDATE stocks SET unidades = 1 WHERE producto = (SELECT id FROM productos WHERE nombre_corto ='PAPYRE62GB') AND tienda = 1;");
    echo "Consulta 1 realizada. Número de filas afectadas: ".$query->rowCount()."<br>";

    $insert = $bd->query("INSERT INTO stocks (producto, tienda, unidades) VALUES ((SELECT id FROM productos WHERE nombre_corto = 'PAPYRE62GB'), 2, 2);");
    echo "Consulta 2 realizada. Número de filas afectadas: ".$query->rowCount()."<br>";

    $bd->commit();
    echo "\nTransacción realizada con éxito.\n";

} catch (PDOException $e) {
    $bd->rollBack();
    echo "\nError en la transacción, operación revertida: " . $e->getMessage();
}


?>