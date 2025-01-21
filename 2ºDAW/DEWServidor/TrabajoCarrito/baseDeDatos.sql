DROP DATABASE IF EXISTS carrito_compra; 
CREATE DATABASE carrito_compra;
USE carrito_compra;

CREATE TABLE Categorias (
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(250),
);

CREATE TABLE Productos (
id_producto INT PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(50) NOT NULL,
descripcion VARCHAR(250),
precio DECIMAL(10,2) NOT NULL,
stock INT NOT NULL,
categoria INT NOT NULL,
FOREIGN KEY (categoria) REFERENCES Categorias(id_categoria)
);

CREATE TABLE Clientes (
id_cliente INT PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(50) NOT NULL,
email VARCHAR(50) UNIQUE NOT NULL,
contraseña VARCHAR(50) NOT NULL,
direccion VARCHAR(100)
);

CREATE TABLE Pedidos (
id_Pedido INT PRIMARY KEY AUTO_INCREMENT,
enviado BOOL DEFAULT FALSE,
fecha DATETIME NOT NULL,
id_cliente INT NOT NULL,
FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente)
);

CREATE TABLE PedidosProductos (
    id_detalle INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES Pedidos(id_pedido),
    FOREIGN KEY (id_producto) REFERENCES Productos(id_producto)
);


/* INSERTS */
/*
INSERT INTO Productos (categoria, nombre, descripcion, precio, stock) VALUES (

);
INSERT INTO Clientes (nombre, email, contraseña, direccion) VALUES  (

);

INSERT INTO Pedidos (fecha, enviado, id_cliente) VALUES (

);
*/
SELECT * FROM Clientes;
SELECT * FROM Productos;
SELECT * FROM Pedidos;
SELECT * FROM PedidoProducto;

