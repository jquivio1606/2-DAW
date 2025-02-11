/* Categoria */
INSERT INTO carrito_symfony.categoria (id, nombre, descripcion) VALUES (1, 'Componentes', 'Componentes de hardware para ordenadores');
INSERT INTO carrito_symfony.categoria (id, nombre, descripcion) VALUES (2, 'Periféricos', 'Dispositivos periféricos para ordenadores');
INSERT INTO carrito_symfony.categoria (id, nombre, descripcion) VALUES (3, 'Móviles', 'Smartphones, tablets y accesorios');
INSERT INTO carrito_symfony.categoria (id, nombre, descripcion) VALUES (4, 'Electrónica', 'Electrodomésticos y dispositivos electrónicos');
INSERT INTO carrito_symfony.categoria (id, nombre, descripcion) VALUES (5, 'Gaming', 'Productos para jugadores profesionales y amateurs');
INSERT INTO carrito_symfony.categoria (id, nombre, descripcion) VALUES (6, 'Accesorios', 'Accesorios variados para tecnología y electrónica');

/* Cliente */

INSERT INTO carrito_symfony.cliente (id, nombre, email, contraseña, direccion) VALUES (1, 'usuario', 'usuario@example.com', 'usuario', '123 Calle Falsa');

/* Pedido */

INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (1, 1, 0, '2024-11-20 23:34:47');
INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (2, 1, 0, '2024-11-21 05:36:22');
INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (3, 1, 0, '2024-11-21 05:38:08');
INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (4, 1, 0, '2024-11-21 05:40:59');
INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (5, 1, 0, '2024-11-21 05:41:22');
INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (6, 1, 0, '2024-11-21 06:03:13');
INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (7, 1, 0, '2024-11-21 06:04:58');
INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (8, 1, 0, '2024-11-21 06:05:31');
INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (9, 1, 0, '2024-11-21 06:06:21');
INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (10, 1, 0, '2024-11-21 06:08:20');
INSERT INTO carrito_symfony.pedido (id, id_cliente, enviado, fecha) VALUES (11, 1, 0, '2024-11-21 06:09:28');

/* Producto */

INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (1, 3, 'Procesador Intel i9', '   Procesador Intel Core i9 de última generación', 500.05, 10);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (2, 2, 'Teclado Mecánico', '  Teclado mecánico RGB para gaming', 79.99, 20);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (3, 3, 'Smartphone Galaxy S22', 'Samsung Galaxy S22 con pantalla AMOLED', 899.99, 12);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (4, 2, 'Auriculares Inalámbricos Sony', 'Auriculares Bluetooth con cancelación de ruido', 159.99, 50);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (5, 1, 'Laptop Dell XPS 13', ' Laptop Dell XPS 13 con pantalla táctil', 1299.99, 5);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (6, 2, 'Monitor Acer 27" 144Hz', 'Monitor para gaming 144Hz y resolución 4K', 349.99, 20);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (7, 2, 'Router TP-Link AC1750', 'Router inalámbrico para WiFi rápido', 59.99, 30);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (8, 1, 'Placa Base ASUS ROG', 'Placa base para gaming con soporte para overclocking', 199.99, 18);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (9, 2, 'Impresora HP LaserJet', 'Impresora láser HP con WiFi', 120.99, 12);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (10, 4, 'Cámara Digital Canon EOS', 'Cámara profesional DSLR Canon EOS 1500D', 549.99, 5);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (11, 5, 'Mochila Gaming', 'Mochila para laptop y accesorios de gaming', 49.99, 40);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (12, 5, 'Silla Gamer DXRacer', 'Silla ergonómica para jugadores con reposabrazos ajustables', 229.99, 9);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (13, 2, 'Teclado Logitech K840', 'Teclado mecánico con retroiluminación LED', 99.99, 60);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (14, 2, 'Ratón Gaming Razer', 'Ratón de precisión para gaming con 10 botones', 69.99, 45);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (15, 3, 'Smartwatch Fitbit Versa', 'Smartwatch con monitorización de actividad y salud', 199.99, 35);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (16, 2, 'Airpods Pro', 'Auriculares inalámbricos Apple con cancelación de ruido', 249.99, 25);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (17, 2, 'Bocina Bluetooth JBL', 'Altavoz Bluetooth portátil resistente al agua', 79.99, 55);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (18, 1, 'SSD Samsung 1TB', 'Disco SSD de 1TB para mejorar el rendimiento del PC', 109.99, 80);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (19, 5, 'Gafas VR Oculus', 'Gafas de realidad virtual Oculus Quest 2', 399.99, 7);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (20, 4, 'Refrigerador Samsung 18P', 'Refrigerador de 18 pies con tecnología inverter', 899.99, 3);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (21, 4, 'Air Conditioner LG', 'Aire acondicionado portátil LG con control remoto', 299.99, 10);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (22, 2, 'Parlantes Bose SoundLink', 'Parlantes Bluetooth Bose SoundLink', 199.99, 15);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (23, 4, 'Camara GoPro Hero 10', 'Cámara GoPro Hero 10 para aventuras extremas', 349.99, 6);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (24, 3, 'Tablet iPad Pro 12"', 'Tablet iPad Pro de 12" con chip M1', 1099.99, 5);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (25, 2, 'Cargador Inalámbrico Samsung', 'Cargador inalámbrico rápido para dispositivos Samsung', 39.99, 50);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (26, 6, 'Guitarra Eléctrica Fender', 'Guitarra eléctrica Fender Stratocaster', 799.99, 18);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (27, 2, 'Micrófono USB Blue Yeti', 'Micrófono USB para streaming y grabaciones profesionales', 129.99, 30);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (28, 2, 'Mousepad Razer', 'Alfombrilla para ratón Gaming Razer', 19.99, 50);
INSERT INTO carrito_symfony.producto (id, categoria_id, nombre, descripcion, precio, stock) VALUES (29, 2, 'Altavoces Logitech', 'Altavoces de 2.1 para PC Logitech', 69.99, 35);

/* Pedidos-Productos */

INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (1, 1, 1, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (2, 1, 2, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (3, 2, 1, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (4, 2, 2, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (5, 2, 3, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (6, 3, 1, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (7, 3, 2, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (8, 3, 3, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (9, 4, 1, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (10, 4, 2, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (11, 4, 3, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (12, 5, 5, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (13, 5, 12, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (14, 6, 1, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (15, 7, 1, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (16, 8, 1, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (17, 9, 1, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (18, 10, 5, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (19, 10, 26, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (20, 11, 5, 1);
INSERT INTO carrito_symfony.pedidosproductos (id, id_pedido, id_producto, cantidad) VALUES (21, 11, 26, 1);