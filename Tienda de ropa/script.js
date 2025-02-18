// URL del archivo JSON servido localmente
const url = 'http://localhost:8080/productos.json'; // Asegúrate de que el archivo está en esta ruta

// Función para obtener los productos
function obtenerProductos() {
  axios.get(url)
  .then((respuesta) => {
    console.log('Respuesta completa:', response); // Agrega esta línea para inspeccionar la respuesta completa
    if (respuesta.status === 200) {
      const productos = respuesta.data.productos;
      console.log('Productos obtenidos:', productos); // Inspecciona aquí también

      // Verifica que productos es un array
      if (Array.isArray(productos)) {
        productos.forEach(producto => {
          console.log(producto);
        });
      } else {
        console.error('Error: "productos" no es un array:', productos);
      }
    } else {
      console.log('Error al obtener los productos. Código de estado:', respuesta.status);
    }
  })
  .catch((error) => {
    console.error('Error en la solicitud:', error);
  });
}

// Llamamos a la función para obtener los productos
obtenerProductos();