-- 1.Crear una base de datos llamada 'proyecto'
DROP DATABASE IF EXISTS proyecto;
CREATE DATABASE proyecto;
USE proyecto;

-- 2.Crear las tablas del siguiente esquema, fíjate en los campos y las relaciones entre ellas
CREATE TABLE familias(
    cod VARCHAR(6) PRIMARY KEY,
    nombre VARCHAR(200)
);

CREATE TABLE productos (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(200),
    nombre_corto VARCHAR(50) UNIQUE,
    descripcion TEXT,
    pvp DECIMAL(10,2),
    familia VARCHAR(6),
    FOREIGN KEY (familia) REFERENCES familias(cod)
);

CREATE TABLE tiendas(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    tlf VARCHAR(13)
);

CREATE TABLE stocks(
    producto INT(11),
    tienda INT(11),
    unidades INT(10) UNSIGNED,
    PRIMARY KEY (producto, tienda),
    FOREIGN KEY(producto) REFERENCES productos(id),
    FOREIGN KEY(tienda) REFERENCES tiendas(id)
);

-- 3.Crear un usuario con contraseña
CREATE USER 'gestor'@'localhost' IDENTIFIED BY 'secreto';

-- 4.Asignar privilegios (por ejemplo, acceso total a una base de datos específica)
GRANT ALL PRIVILEGES ON proyecto.* TO 'gestor'@'localhost';

-- Aplicar los cambios
FLUSH PRIVILEGES;

