DROP DATABASE IF EXISTS proyecto;

-- 1. Crear una base de datos llamada ’proyecto’
CREATE DATABASE proyecto;
USE proyecto;

-- 2. Crear las tablas del siguiente esquema, fíjate en los campos y las relaciones entre ellas. 
CREATE TABLE familias (
    cod VARCHAR(25) PRIMARY KEY,
    nombre VARCHAR(200)
);

CREATE TABLE productos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(200),
    nombre_corto VARCHAR(50) UNIQUE,
    descripcion TEXT,
    pvp DECIMAL(10,2),
    familia VARCHAR(6),
    FOREIGN KEY (familia) REFERENCES familias(cod)
);

CREATE TABLE tiendas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    tlf VARCHAR(13)
);

CREATE TABLE stocks (
    producto INT(11),
    tienda INT(11),
    unidades INT(10) UNSIGNED,
    PRIMARY KEY (producto, tienda),
    FOREIGN KEY (producto) REFERENCES productos(id),
    FOREIGN KEY (tienda) REFERENCES tiendas(id)
);

-- 3. Crear el usuario "gestor" con contraseña "secreto"
CREATE USER 'gestor'@'%' IDENTIFIED BY 'secreto';

-- 4. Dale permisos de administrador (todos los permisos) en la base de datos "proyecto"
GRANT ALL PRIVILEGES ON proyecto.* TO 'gestor'@'%';
FLUSH PRIVILEGES;