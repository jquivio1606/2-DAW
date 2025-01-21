<?php
/*Nos conectamos a la base*/
try{
    $bd = new PDO('mysql:dbname=proyecto;host=127.0.0.1','root',"");
}catch(PDOException $e){
    echo 'Error con la base de datos: '.$e->getMessage();
}

/* Actividad 3
-- Iniciar la transacción*/
try {
               
        $bd->beginTransaction();
    
        $actualizar = $bd->query("UPDATE stocks 
                                    SET unidades=1 
                                    WHERE producto =(SELECT id FROM productos WHERE nombre_corto='PAPYRE62GB')
                                    AND tienda=1;");
        
    
        $insertar = $bd->query("INSERT INTO stocks (producto, tienda, unidades)
                                VALUES (
                                (SELECT id FROM productos WHERE nombre_corto = 'PAPYRE62GB'),
                                2,
                                2);
                                ");
            
        $bd->commit();
        echo "\nTransacción realizada con éxito.\n";
    
    } catch (PDOException $e) {
        $bd->rollBack();
        echo "\nError en la transacción, operación revertida: " . $e->getMessage();
    }
