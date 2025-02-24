async function cargarNovedades() {
    try {
        // Obtenemos algunos productos de la API
        const respuesta = await axios.get('https://dummyjson.com/products/category/tops');
        const productos = respuesta.data.products;

        // Seleccionamos el contenedor interno del carrusel
        const contenedorCarousel = document.querySelector('#carouselExampleDark .carousel-inner');
        // Limpiamos el contenido actual del carrusel
        contenedorCarousel.innerHTML = '';

        // Tomamos los 6 primeros productos (o la cantidad que necesites)
        productos.slice(0, 6).forEach((producto, indice) => {
            // La primera imagen se marca como activa
            const claseActiva = indice === 0 ? 'active' : '';
            // Creamos el HTML para cada ítem del carrusel

            const itemCarousel = `
            <div class="carousel-item ${claseActiva}" data-bs-interval="10000">
                <img src="${producto.thumbnail}" class="d-block mt-5" alt="Novedad ${indice + 1}">
            </div>
            <div class="carousel-caption d-none d-md-block">
                <h5>PROXIMAMENTE: Nuevos modelos de vestidos</h5>
                <p>Disponibles a partir del 1 de Marzo</p>
            </div>
        `;
            contenedorCarousel.innerHTML += itemCarousel;
        });
    } catch (error) {
        console.error("Error al cargar novedades:", error);
    }
}

// Ejecutamos la función cuando el DOM se haya cargado completamente
document.addEventListener('DOMContentLoaded', () => {
    cargarNovedades();
});
