// Definir la clave de API para la conexión con OMDb
const APIKEY = "13a90d5f";

// Obtener el botón y el elemento de carga para mostrarlo mientras se busca la película
let boton = document.getElementById("btn");
let carga = document.getElementById("cargando");

// Evento para manejar el clic del botón de búsqueda
boton.addEventListener("click", async () => {
  // Obtener el título de la película desde el campo de entrada
  var tituloPelicula = document.getElementById("titulo_peli").value;

  // Limpiar resultados anteriores y eliminar clases anteriores del contenedor
  contenedorDatos.innerHTML = "";
  contenedorDatos.className = "";

  // Validar si se ha introducido un título de película
  if (tituloPelicula == "") {
    mostrarError("Introduzca un título de película, por favor.");
    carga.hidden = true; // Ocultar el indicador de carga si no se ha introducido un título
  } else {
    // Realizar la solicitud GET a la API de OMDb con el título de la película
    await axios.get("http://www.omdbapi.com/", {
      params: {
        apikey: APIKEY,
        t: tituloPelicula,
        plot: "full"
      },
    })
      .then((respuesta) => {
        console.log(respuesta); // Mostrar la respuesta de la API en la consola
        const datos = respuesta.data; // Obtener los datos de la respuesta
        carga.hidden = false; // Mostrar el indicador de carga

        // Esperar 2 segundos antes de mostrar la información o el error
        setTimeout(() => {
          // Verificar si la respuesta es exitosa y mostrar la información de la película
          if (datos.Response == 'True') {
            mostrarInformacionPelicula(datos);
          } else {
            mostrarError("No se encontró la película. Intenta con otro título");
          }
        }, 2000);
      })
      .catch((err) => {
        // Manejar el error en caso de que ocurra durante la solicitud
        mostrarError("Ha ocurrido el error: " + err + ". Intentelo más tarde");
      });
  }
})

// Obtener el contenedor donde se mostrarán los datos de la película
let contenedorDatos = document.getElementById("cont-datos");

// Función para mostrar la información de la película en el contenedor
function mostrarInformacionPelicula(datos) {
  // Verificar si la película tiene un póster disponible
  if (datos.Poster !== "N/A") {
    contenedorDatos.classList.add("con-poster"); // Añadir clase para mostrar el póster
    contenedorDatos.innerHTML = `
        <h2>${datos.Title} - (${datos.Year})</h2>
        <img id="poster" class="poster" src="${datos.Poster}" alt="Poster de la película: ${datos.Title}">
        <div class="div2">
            <div class="detalle"><strong>Género:</strong> ${datos.Genre}</div>
            <div class="detalle"><strong>Tipo:</strong> ${datos.Type}</div>
            <div class="detalle"><strong>Duración:</strong> ${datos.Runtime}</div>
            <div class="detalle"><strong>Reparto:</strong> ${datos.Actors}</div>
            <div class="detalle"><strong>Director/es:</strong> ${datos.Director}</div>
        </div>
        <div class="cont2">
            <div class="detalle"><strong>Escritor/es:</strong> ${datos.Writer}</div>
            <div class="detalle"><strong>Clasificación:</strong> ${datos.Rated}</div>
            <div class="detalle"><strong>Calificación IMDb:</strong> ${datos.imdbRating}</div>
            <div class="detalle"><strong>Idioma:</strong> ${datos.Language}</div>
        </div>
        <div class="sinopsis"><strong>Sinopsis:</strong> ${datos.Plot}</div>
    `;
  } else {
    // Si no hay póster disponible, mostrar la información sin la imagen
    contenedorDatos.classList.add("sin-poster");
    contenedorDatos.innerHTML = `
         <h2>${datos.Title} - (${datos.Year})</h2>
        <div class="cont2">
            <div class="detalle"><strong>Género:</strong> ${datos.Genre}</div>
            <div class="detalle"><strong>Tipo:</strong> ${datos.Type}</div>
            <div class="detalle"><strong>Duración:</strong> ${datos.Runtime}</div>
            <div class="detalle"><strong>Reparto:</strong> ${datos.Actors}</div>
            <div class="detalle"><strong>Director/es:</strong> ${datos.Director}</div>
            <div class="detalle"><strong>Escritor/es:</strong> ${datos.Writer}</div>
            <div class="detalle"><strong>Clasificación:</strong> ${datos.Rated}</div>
            <div class="detalle"><strong>Calificación IMDb:</strong> ${datos.imdbRating}</div>
            <div class="detalle"><strong>Idioma:</strong> ${datos.Language}</div>
        </div>
        <div class="sinopsis"><strong>Sinopsis:</strong> ${datos.Plot}</div>
    `;
  }

  carga.hidden = true; // Ocultar el indicador de carga después de mostrar la información
}

// Función para mostrar un mensaje de error si ocurre algún problema
function mostrarError(msjError) {
  contenedorDatos.innerHTML = ""; // Limpiar los resultados anteriores
  let contError = document.createElement("h3");
  contError.textContent = msjError; // Mostrar el mensaje de error
  contenedorDatos.appendChild(contError); // Añadir el mensaje de error al contenedor
}
