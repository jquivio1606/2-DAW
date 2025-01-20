DROP DATABASE IF EXISTS tienda;

CREATE DATABASE IF NOT EXISTS tienda;
USE tienda;

CREATE TABLE familias (
    id_familia INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    descripción VARCHAR(100) NOT NULL
);

CREATE TABLE productos (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    familia INT NOT NULL,
    FOREIGN KEY (familia) REFERENCES familias(id_familia)
);

-- Insertar datos en la tabla familias
INSERT INTO familias (nombre, descripción) VALUES
('Electrónica', 'Artículos electrónicos y dispositivos'),
('Hogar', 'Productos para el hogar y decoración'),
('Deportes', 'Equipamiento y accesorios deportivos'),
('Ropa', 'Prendas de vestir y accesorios');

-- Insertar datos en la tabla productos
INSERT INTO productos (nombre, precio, familia) VALUES
('Televisor 4K', 599.99, 1),
('Smartphone', 899.99, 1),
('Sofá de tres plazas', 450.00, 2),
('Mesa de comedor', 300.00, 2),
('Bicicleta de montaña', 700.00, 3),
('Pesas de 10 kg', 50.00, 3),
('Camiseta deportiva', 25.00, 4),
('Pantalones vaqueros', 40.00, 4);