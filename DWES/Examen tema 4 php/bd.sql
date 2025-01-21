DROP DATABASE IF EXISTS tienda;
CREATE DATABASE IF NOT EXISTS tienda;
USE tienda;

CREATE TABLE fabricante (
    codigo INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL  
);

CREATE TABLE producto (
    codigo INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    codigo_fabricante INT NOT NULL,
    FOREIGN KEY (codigo_fabricante) REFERENCES fabricante(codigo)
);

INSERT INTO fabricante VALUES 
(1, 'Asus'), (2, 'Lenovo'), (3, 'HP'), (4, 'Samsung'), (5, 'Seagate'), (6, 'Crucial'), (7, 
'Gigabyte');

INSERT INTO producto VALUES
(1, 'Disco Duro', 86.99, 5),
(2, 'Memoria RAM', 120, 6),
(3, 'Disco SSD', 15.99, 4),
(4, 'GeForce', 185, 7),
(5, 'Monitor', 202, 1),
(6, 'Portátil', 505, 2),
(7, 'Impresora', 59.99, 3);

CREATE USER 'judit'@'%' IDENTIFIED BY 'dwes';

GRANT ALL PRIVILEGES ON tienda.* TO 'judit'@'%';
FLUSH PRIVILEGES;