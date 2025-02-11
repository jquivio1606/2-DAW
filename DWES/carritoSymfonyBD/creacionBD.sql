DROP DATABASE IF EXISTS carrito_symfony;
CREATE DATABASE carrito_symfony;
USE carrito_symfony;

create table categoria
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50)  NOT NULL,
    descripcion VARCHAR(100) NOT NULL
);

create table cliente
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    contraseña VARCHAR(50) NOT NULL,
    direccion VARCHAR(100) NOT NULL
);

create table pedido
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    enviado TINYINT(1) DEFAULT 0 NOT NULL,
    fecha DATETIME NOT NULL,
    FOREIGN KEY(id_cliente) REFERENCES cliente(id)
);

create index id_cliente
    on pedido (id_cliente);

create table producto
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(250) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    FOREIGN KEY(categoria_id) REFERENCES categoria (id)
);

create index categoria
    on producto (categoria_id);

create table pedidosproductos
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY(id_pedido) REFERENCES pedido (id),
    FOREIGN KEY(id_producto) REFERENCES producto (id)
);

create index id_pedido
    on pedidosproductos (id_pedido);

create index id_producto
    on pedidosproductos (id_producto);