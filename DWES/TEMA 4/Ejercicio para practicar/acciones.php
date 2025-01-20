<?php
    require 'bd.php';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    switch ($action){
        case 'add':
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nombre = $_POST['nombre'];
                $precio = $_POST['nombre'];
                $familia = $_POST['nombre'];

                $agregar = crear_producto();  
            }

            break;
        case 'update':
            if(isset($_GET['id'])){
                $id=intval($_GET['id']);
            }
            $producto=mostrar_productos_por_id($id);
            

            $actualizar= actualizar_producto();

            break;
        case 'delete':


            break;
    }


?>