<?php
function leer_config($nombre, $esquema){
	$config = new DOMDocument();
	$config->load($nombre);
	$res = $config->schemaValidate($esquema);
	
	if ($res===FALSE){ 
	   throw new InvalidArgumentException("Revise fichero de configuración");
	} 		
	
	$datos = simplexml_load_file($nombre);	
	$ip = $datos->xpath("//ip");
	$nombre = $datos->xpath("//nombre");
	$usu = $datos->xpath("//usuario");
	$clave = $datos->xpath("//clave");	
	$cad = sprintf("mysql:dbname=%s;host=%s", $nombre[0], $ip[0]);
	$resul = [];
	$resul[0] = $cad;
	$resul[1] = $usu[0];
	$resul[2] = $clave[0];
	return $resul;
}

function comprobar_usuario($nombre, $clave){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$select = "select id_cliente, nombre from clientes where nombre = '$nombre' and clave = '$clave'";
	$resul = $bd->query($select);	
	
	if($resul->rowCount() === 1){		
		return $resul->fetch();		
	} else {
		return FALSE;
	}
}
function cargar_categorias(){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$select = "select id_categoria, nombre from categorias";
	$resul = $bd->query($select);	
	
	if (!$resul) {
		return FALSE;
	}
	
	if ($resul->rowCount() === 0) {    
		return FALSE;
    }
	//si hay 1 o más
	return $resul;	
}
function cargar_categoria($codCat){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$select = "select nombre, descripcion from categorias where id_categoria = $codCat";
	$resul = $bd->query($select);	
	
	if (!$resul) {
		return FALSE;
	}
	
	if ($resul->rowCount() === 0) {    
		return FALSE;
    }	
	//si hay 1 o más
	return $resul->fetch();	
}
function cargar_productos_categoria($codCat){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);	
	$select = "select * from productos where categoria  = $codCat";	
	$resul = $bd->query($select);	
	
	if (!$resul) {
		return FALSE;
	}
	
	if ($resul->rowCount() === 0) {    
		return FALSE;
    }	
	//si hay 1 o más
	return $resul;			
}
// recibe un array de códigos de productos
// devuelve un cursor con los datos de esos productos
function cargar_productos($codigosProductos){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$texto_in = implode(",", $codigosProductos);
	$select = "select * from productos where id_producto in($texto_in)";
	$resul = $bd->query($select);	
	if (!$resul) {
		return FALSE;
	}
	return $resul;	
}
function insertar_pedido($carrito, $codRes){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$bd->beginTransaction();	
	$hora = date("Y-m-d H:i:s", time());
	// insertar el pedido
	$ins = "insert into pedidos (fecha, enviado, id_cliente) values ('$hora',false, $codRes)";
	$resul = $bd->query($ins);	
	
	if (!$resul) {
		return FALSE;
	}

	// coger el id del nuevo pedido para las filas detalle
	$pedido = $bd->lastInsertId();

	// insertar las filas en pedidoproductos
	foreach($carrito as $codProd=>$unidades){
		$sql = "insert into pedidosproductos(id_pedido, id_producto, cantidad) values( $pedido, $codProd, $unidades)";			
		 $resul = $bd->query($sql);	
		
		 if (!$resul) {
			$bd->rollback();
			return FALSE;
		}
	}
	$bd->commit();
	return $pedido;
}

