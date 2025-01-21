<?php
    require 'vendor/autoload.php';
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    $bd = $cliente->libroservidor;
    /*try {
        $res = $bd->usuarios->insertOne(['nombre'=>'Ana','clave'=>'1234', 'saldo'=>1000]);
    } catch (\Throwable $th) {
        //throw $th;
    }*/
?>
