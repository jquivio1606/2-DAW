// Obtenemos el título de la sección
const titulo = document.getElementById("titulo");

// Obtenemos el contenedor donde se mostrarán los productos
const contenedorProductos = document.getElementById('cont-prod');

// Función para meter los productos en el grid
function cargarProductos(productos) {
  contenedorProductos.innerHTML = ''; // Limpiamos el contenido actual
  productos.forEach(producto => {
    const tarjeta = `
      <div class="col">
        <div class="card h-100 producto">
          <img src="${producto.thumbnail}" class="card-img-top" alt="${producto.title}">
          <div class="card-body">
            <h5 class="card-title"><strong>${producto.title}</strong></h5>
            <p class="card-text">${producto.description}</p>
          </div>
          <div class="card-footer text-center">
              <p class="card-text fs-5"><strong>${producto.price} €</strong></p>
            </div>
          <div class="card-footer text-center">
            <button class="btn" type="button">Añadir a la cesta</button>
          </div>
        </div>
      </div>
    `;
    contenedorProductos.innerHTML += tarjeta;
  });
}

// Función para obtener todos los productos de la tienda
async function obtenerProductosTienda() {
  try {
    const [respuestaCamisasHombre, respuestaVestidosMujer, respuestaZapatosHombre, respuestaZapatosMujer, respuestaJoyería, respuestaBolsos] = await Promise.all([
      axios.get('https://dummyjson.com/products/category/mens-shirts'),
      axios.get('https://dummyjson.com/products/category/womens-dresses'),
      axios.get('https://dummyjson.com/products/category/mens-shoes'),
      axios.get('https://dummyjson.com/products/category/womens-shoes'),
      axios.get('https://dummyjson.com/products/category/womens-jewellery'),
      axios.get('https://dummyjson.com/products/category/womens-bags')
    ]);

    const productos = [
      ...respuestaCamisasHombre.data.products,
      ...respuestaVestidosMujer.data.products,
      ...respuestaZapatosHombre.data.products,
      ...respuestaZapatosMujer.data.products,
      ...respuestaJoyería.data.products,
      ...respuestaBolsos.data.products
    ];

    return productos;
  } catch (error) {
    console.error('Error al obtener productos de la tienda:', error);
    return [];
  }
}

// Función para cargar productos de Ropa
async function cargarRopa() {
  titulo.innerHTML = "Ropa";
  try {
    const todosProductos = await obtenerProductosTienda();
    const productosRopa = todosProductos.filter(producto =>
      producto.category === 'mens-shirts' || producto.category === 'womens-dresses'
    );
    cargarProductos(productosRopa);
  } catch (error) {
    console.error('Error al cargar productos de ropa:', error);
  }
}

// Función para cargar productos de Zapatos
async function cargarZapatos() {
  titulo.innerHTML = "Zapatos";
  try {
    const todosProductos = await obtenerProductosTienda();
    const productosZapatos = todosProductos.filter(producto =>
      producto.category === 'mens-shoes' || producto.category === 'womens-shoes'
    );
    cargarProductos(productosZapatos);
  } catch (error) {
    console.error('Error al cargar productos de zapatos:', error);
  }
}

// Función para cargar productos de Accesorios
async function cargarAccesorios() {
  titulo.innerHTML = "Accesorios";
  try {
    const todosProductos = await obtenerProductosTienda();
    const productosAccesorios = todosProductos.filter(producto =>
      producto.category === 'womens-jewellery' || producto.category === 'womens-bags'
    );
    cargarProductos(productosAccesorios);
  } catch (error) {
    console.error('Error al cargar productos de accesorios:', error);
  }
}

// Función para cargar productos en Oferta (con descuento mayor o igual a 10%)
async function cargarOfertas() {
  titulo.innerHTML = "Ofertas";
  try {
    const todosProductos = await obtenerProductosTienda();
    const productosOferta = todosProductos.filter(producto => producto.discountPercentage >= 15);
    cargarProductos(productosOferta);
  } catch (error) {
    console.error('Error al cargar productos en oferta:', error);
  }
}

// Cargamos por defecto todos los productos al iniciar la página
document.addEventListener('DOMContentLoaded', async () => {
  try {
    const todosProductos = await obtenerProductosTienda();
    cargarProductos(todosProductos);
  } catch (error) {
    console.error('Error al cargar productos de la tienda:', error);
  }
});