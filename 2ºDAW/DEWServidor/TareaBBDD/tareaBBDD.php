<?php
//1-2. Conectar base de datos empresa y generar una excepción si no se conecta
$cadena='mysql:dbname=empresa;host=127.0.0.1*root*';
list($conexion, $usuario, $clave)= explode("*", $cadena);
try{
    $bd = new PDO($conexion, $usuario, $clave);
    echo "Conexión realizada con éxito<br>";
}catch(PDOException $e){
    echo 'Error con la base de datos: '.$e->getMessage();
}

//3. Introducir registros en la tabla Usuario
$introUsuarios = "INSERT INTO usuarios(nombre,clave,rol) VALUES 
    ('Usuario1', 'User1', '1'),
    ('Usuario2', 'User2', '1'),
    ('Usuario3', 'User2', '1'),
    ('Usuario4', 'User1', '1'),
    ('Root1', 'rot1', '0')";
$resul = $bd->query($introUsuarios);
if($resul){
    echo "\nUsuarios introducidos correctamente.";
    echo "\nRegistros insertados: ".$resul->rowCount();
}else{
    echo "\Los usuarios no se han podido introducir correctamente";
}

    //4.Mostrar todos los usuarios
    $sql = "SELECT codigo, nombre, clave, rol FROM usuarios";
    $usuarios = $bd->query($sql);
    echo "\nCodigo\t Usuario\t Clave\t Rol\n<br>";
    foreach($usuarios as $row){
        print$row['codigo']."\t";
        print $row['nombre']."\t";
        print $row['clave']."\t";
        print $row['rol']."\t\n<br>";
    }

    //5. Mostrar los usuarios con rol 0
    $sql2 = "SELECT codigo, nombre, clave, rol FROM usuarios WHERE rol='0'";
    $usuarios = $bd->query($sql2);
    echo "\nUsuarios con rol 0";
    echo "\nCodigo\t Usuario\t Clave\t Rol\n<br>";
    foreach($usuarios as $row){
        print$row['codigo']."\t";
        print $row['nombre']."\t";
        print $row['clave']."\t";
        print $row['rol']."\t\n<br>";
    }

     //6. Mostrar los usuarios con el rol que le pasemos por parámetros
     $sql3 = $bd->prepare("SELECT codigo, nombre, clave, rol FROM usuarios WHERE rol=?");
     $sql3->execute(array(0));     
     echo "\nUsuarios con rol 0 pasado por parámetro";
     echo "\nCodigo\t Usuario\t Clave\t Rol\n<br>";
     foreach($sql3 as $row){
         print$row['codigo']."\t";
         print $row['nombre']."\t";
         print $row['clave']."\t";
         print $row['rol']."\t\n<br>";
     }    

     /*7. Borra de la tabla Usuarios aquellos registros cuyo nombre contengan la palabra “Usuario” 
    excepto aquellos que la clave sea User1. Hazlo mediante una consulta interactiva, que 
    permita indicar la clave de los registros a borrar. Tendrás que comprobar que la consulta se 
    ha realizado correctamente, y mostrar por pantalla el número de registros afectados, pero en 
    este caso, utilizando el método ‘exec’; o el mensaje de error correspondiente en caso contrario.*/
    
    $cont=$bd->exec("DELETE FROM usuarios WHERE nombre LIKE 'Usuario%' AND clave!='User1'");
    echo "Registros: ".$cont;
    if($cont>0){
       echo "\nSe ha borrado correctamente";
    }else{
       echo "\nHa ocurrido un error al borrar";
    }
    
     
     //8. Actualiza los datos de Root1, para que la clave sea root1
     $actDatos="UPDATE usuarios set clave='root1' WHERE nombre='Root1'";
     $resulActualizar=$bd->query($actDatos);

     //9. Muestra los registros de la tabla Usuarios para ver los cambios realizados, utilizando ‘fetch’.
     
     $mostrarDatos=$bd->query("SELECT codigo, nombre, clave, rol FROM usuarios");
     echo "\nMostrar los datos con FETCH_ASSOC";
     echo "\nCodigo\t Usuario\t Clave\t Rol\n<br>";
     while ($row = $mostrarDatos->fetch(PDO::FETCH_ASSOC)) {
        echo $row["codigo"]."\t\t";
        echo $row["nombre"]."\t\t";
        echo $row["clave"]."\t\t";
        echo $row["rol"]."\t\t";
        echo "\n";
    }

    // 10. Vuelve a mostrar los registros con ‘fetch’, y utilizando la opción PDO::FETCH_OBJ.
    echo "\nTabla usuarios modificada, se muestra con FETCH_OBJ \n";
    $query = $bd->query("SELECT codigo, nombre, clave, rol FROM usuarios");
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo $row->codigo."\t\t";
        echo $row->nombre."\t\t";
        echo $row->clave."\t\t";
        echo $row->rol."\t\t";
        echo "\n";
    }

    /*11. Controla las siguientes acciones mediante una transacción, de forma que si se produce un 
    error, podamos devolver a la bbdd a su estado anterior al error. Habrá que mostrar el error.
    a) Borra de la tabla Usuario aquel/los usuarios cuyo nombre sea Root1.
    b) Añade a la tabla Usuario, un nuevo usuario con los siguientes datos: Usuario1. User3, 0.*/

    try {
               
        $bd->beginTransaction();
    
        $borrar = $bd->prepare("DELETE FROM usuarios WHERE nombre = ?");
        $borrar->execute(array('Root1'));
        echo "Usuario 'Root1' borrado correctamente.\n";
    
        $insert2 = $bd->prepare("INSERT INTO usuarios (nombre, clave, rol) VALUES (?, ?, ?)");
        $insert2->execute(array('Usuario1', 'User3', 0));
        echo "Usuario 'Usuario1' añadido correctamente.\n";
    
        $bd->commit();
        echo "\nTransacción realizada con éxito.\n";
    
    } catch (PDOException $e) {
        $bd->rollBack();
        echo "\nError en la transacción, operación revertida: " . $e->getMessage();
    }

    /*12. Crea una nueva tabla llamada ‘Pedidos’, mediante una consulta SQL, que contenga los 
    siguientes campos:
    a) IdPedido= autonumérico.
    b) Detalle: string
    c) fecha: date.*/
    $tabla="CREATE TABLE Pedidos (
        IdPedido INT AUTO_INCREMENT PRIMARY KEY,
        Detalle VARCHAR(255),
        Fecha DATE);";
    $crearTabla = $bd->query($tabla);

    //13. Introduce algunos registros en dicha tabla (2 al menos)
    $registros= "INSERT INTO Pedidos(Detalle,Fecha) VALUES
        ('Tomates','2024-10-15'),
        ('Aguacates','2024-10-16');";
    $inserRegistos= $bd->query($registros);

    //14. Muéstralos
    $sql = "SELECT IdPedido, Detalle, Fecha FROM pedidos";
    $pedidos = $bd->query($sql);
    echo "\nIdPedido Detalle\t Fecha\n<br>";
    foreach($pedidos as $row){
        print$row['IdPedido']."\t";
        print $row['Detalle']."\t";
        print $row['Fecha']."\t\n<br>";
    }
    //15. Borra dicha tabla
    $borrarTabla="DROP TABLE Pedidos;";
    $borrar=$bd->query($borrarTabla);

?>