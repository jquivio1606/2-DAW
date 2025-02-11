document.addEventListener('DOMContentLoaded', () => {
    // Usamos Axios para hacer la solicitud GET
    axios.get('https://fakestoreapi.com/products')
      .then(response => {
        const data = response.data; // Los productos estarán en response.data
        const productsContainer = document.querySelector('.products-container');
        
        // Iteramos sobre los productos y los mostramos
        data.forEach(product => {
          const productElement = document.createElement('div');
          productElement.classList.add('product');
          productElement.innerHTML = `
            <img src="${product.image}" alt="${product.title}">
            <h3>${product.title}</h3>
            <p>$${product.price}</p>
            <button>Añadir al carrito</button>
          `;
          productsContainer.appendChild(productElement);
        });
      })
      .catch(error => {
        console.error('Error al cargar los productos:', error);
      });
  });
  