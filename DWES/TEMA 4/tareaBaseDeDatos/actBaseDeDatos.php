<?php
/* JUDIT QUIRÓS VIOLERO */

// 1 .Conectar a la base de datos:
$cadena= 'mysql:dbname=empresa;host=127.0.0.1*root*';

list($conexion,$usuario,$contraseña) = explode("*", $cadena);

try {
    $bd= new PDO($conexion,$usuario,$contraseña);  

// 2 . Captura y genera una excepción si no es posible conectarse a la bbdd, indicando “Conexión
// a la base de datos ‘empresa’ fallida”
} catch (PDOException $e){
    echo "Conexión a la base de datos \"empresa\" fallida: ". $e->getMessage();
}

try {
    $bd->query("DELETE FROM usuarios");
    
    // 3 .Insertar registros:
    
    $insert= $bd->query("INSERT INTO usuarios (nombre,contraseña,rol) VALUES ('Usuario1','User1', 1); ");
    $insert= $bd->query("INSERT INTO usuarios (nombre,contraseña,rol) VALUES ('Usuario2','User2', 1); ");
    $insert= $bd->query("INSERT INTO usuarios (nombre,contraseña,rol) VALUES ('Usuario3','User3', 1); ");
    $insert= $bd->query("INSERT INTO usuarios (nombre,contraseña,rol) VALUES ('Usuario4','User1', 1); ");
    $insert= $bd->query("INSERT INTO usuarios (nombre,contraseña,rol) VALUES ('Root1','rot1', 0); ");

      
    $usuarios = $bd->query("SELECT * FROM usuarios");
    echo "Filas insertadas: ".$insert->rowCount()."\n";


    // 4 .Muestra los registros de la tabla Usuarios para ver los cambios realizados:
    
    foreach($usuarios as $row){
        echo $row["cd"]."\t\t";
        echo $row["nombre"]."\t\t";
        echo $row["contraseña"]."\t\t";
        echo $row["rol"]."\t\t";
        echo "\n";
    };


    // 5 .Obtén de la tabla Usuarios aquellos registros cuyo rol sea=0.
    
    echo "\nUsuarios con el rol 0:\n";
    $userR0=$bd->query("SELECT * FROM usuarios WHERE rol=0");
    foreach($userR0 as $row){
        echo $row["cd"]."\t\t";
        echo $row["nombre"]."\t\t";
        echo $row["contraseña"]."\t\t";
        echo $row["rol"]."\t\t";
        echo "\n";
    };


    // 6 .Haz lo mismo, pero desarrollando una consulta que permita, cada vez que se ejecute, 
    //pasar los parámetros que queramos sin tener que modificar la consulta.
    
    $preparado2=$bd->prepare("SELECT * FROM usuarios WHERE rol=?");
    $preparado2->execute(array(0));

    echo "\nUsuarios con el rol 0:\n";
    foreach($preparado2 as $row){
        echo $row["cd"]."\t\t";
        echo $row["nombre"]."\t\t";
        echo $row["contraseña"]."\t\t";
        echo $row["rol"]."\t\t";
        echo "\n";
    };


    /* 7 .Borra de la tabla Usuarios aquellos registros cuyo nombre contengan la palabra “Usuario”
    excepto aquellos que la clave sea User1. Hazlo mediante una consulta interactiva, que
    permita indicar la clave de los registros a borrar. Tendrás que comprobar que la consulta se
    ha realizado correctamente, y mostrar por pantalla el número de registros afectados, pero en
    este caso, utilizando el método ‘exec’; o el mensaje de error correspondiente en caso
    contrario */

    $delete1=$bd->exec("DELETE  FROM usuarios WHERE nombre LIKE '%Usuario%' and contraseña != 'User1'");

    if($delete1){
        echo "\nNúmero de filas borradas: ".$delete1."\n";
    } else {
        echo "Error en la eliminación.";
    }


    // 8 .Actualiza los datos de Root1, para que la clave sea root1.
    
    $cambio= $bd->query("UPDATE usuarios SET contraseña='root1' WHERE nombre='Root1'");
    

    //9. Muestra los registros de la tabla Usuarios para ver los cambios realizados, utilizando ‘fetch’.
    
    $query = $bd->query("SELECT * FROM usuarios");
    echo "\nTabla usuarios modificada: (con FETCH_ASSOC)\n";
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo $row["cd"]."\t\t";
        echo $row["nombre"]."\t\t";
        echo $row["contraseña"]."\t\t";
        echo $row["rol"]."\t\t";
        echo "\n";
    }


    //10. Vuelve a mostrar los registros con ‘fetch’, y utilizando la opción PDO::FETCH_OBJ.

    echo "\nTabla usuarios modificada: (con FETCH_OBJ) \n";
    $query = $bd->query("SELECT * FROM usuarios");
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo $row->cd."\t\t";
        echo $row->nombre."\t\t";
        echo $row->contraseña."\t\t";
        echo $row->rol."\t\t";
        echo "\n";
    }


    /*11. Controla las siguientes acciones mediante una transacción, de forma que si se produce un
    error, podamos devolver a la bbdd a su estado anterior al error. Habrá que mostrar el error.
    a) Borra de la tabla Usuario aquel/los usuarios cuyo nombre sea Root1.
    b) Añade a la tabla Usuario, un nuevo usuario con los siguientes datos: Usuario1. User3, 0. */
    
    try {
               
        $bd->beginTransaction();
    
        $borrar = $bd->prepare("DELETE FROM usuarios WHERE nombre = ?");
        $borrar->execute(array('Root1'));
        echo "Usuario 'Root1' borrado correctamente.\n";
    
        $insert2 = $bd->prepare("INSERT INTO usuarios (nombre, contraseña, rol) VALUES (?, ?, ?)");
        $insert2->execute(array('Usuario1', 'User3', 0));
        echo "Usuario 'Usuario1' añadido correctamente.\n";
    
        $bd->commit();
        echo "\nTransacción realizada con éxito.\n";
    
    } catch (PDOException $e) {
        $bd->rollBack();
        echo "\nError en la transacción, operación revertida: " . $e->getMessage();
    }


    /* 12. Crea una nueva tabla llamada ‘Pedidos’, mediante una consulta SQL, que contenga los
    siguientes campos:
    a) IdPedido= autonumérico.
    b) Detalle: string
    c) fecha: date.  */

    $tabla= $bd->query("CREATE TABLE pedidos (idPedido INT AUTO_INCREMENT PRIMARY KEY, detalle VARCHAR(50) NOT NULL, fecha DATE);");
    
    
    // 13. Introduce algunos registros en dicha tabla (2 al menos)
    
    $insert3= $bd->query("INSERT INTO pedidos (detalle,fecha) VALUES ('asdfasdfsd','2020/10/10'); ");
    $insert3= $bd->query("INSERT INTO pedidos (detalle,fecha) VALUES ('fvcxvxbgbcvb','2024/10/17'); ");
    
    //14. Muéstralos
    
    echo "\n\nTabla Pedidos: \n";
    $pedidos = $bd->query("SELECT * FROM pedidos");
    foreach($pedidos as $row){
        echo $row["idPedido"]."\t\t";
        echo $row["detalle"]."\t\t";
        echo $row["fecha"]."\t\t";
        echo "\n";
    };

    
    //15. Borra dicha tabla

    $delete= $bd->query("DROP TABLE Pedidos");    


} catch (PDOException $ex){
    echo "Error al insertar los datos en la base de datos: ".$ex->getMessage();
}