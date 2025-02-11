const claveAPI = "13a90d5f";
const botonBuscar = document.getElementById("boton-buscar");
const informacionPeliculaDiv = document.getElementById("informacion-pelicula");
const loadingElement = document.getElementById("loading");

botonBuscar.addEventListener("click", async () => {
  const tituloPelicula = document.getElementById("titulo-pelicula").value.trim();

  if (!tituloPelicula) {
    mostrarError("Por favor, escribe un título para buscar.");
    return;
  }

  // Mostrar el mensaje de carga
  loadingElement.classList.remove('hidden');
  informacionPeliculaDiv.innerHTML = ''; // Limpiar la información previa

  try {
    const respuesta = await axios.get("http://www.omdbapi.com/", {
      params: {
        apikey: claveAPI,
        t: tituloPelicula,
        plot: "full",
      },
    });

    if (respuesta.data.Response === "True") {
      mostrarInformacionPelicula(respuesta.data);
    } else {
      mostrarError("No se encontró la película. Intenta con otro título.");
    }
  } catch (error) {
    mostrarError("Ocurrió un problema al conectar con el servidor. Inténtalo más tarde.");
    console.error(error);
  }
});

function mostrarInformacionPelicula(datos) {
  informacionPeliculaDiv.innerHTML = `
    <h2>${datos.Title} (${datos.Year})</h2>
    <img src="${datos.Poster !== "N/A" ? datos.Poster : "https://via.placeholder.com/300x450"}" alt="Póster de ${datos.Title}">

    <div class="detalle"><strong>Género:</strong> ${datos.Genre}</div>
    <div class="detalle"><strong>Director:</strong> ${datos.Director}</div>
    <div class="detalle"><strong>Reparto:</strong> ${datos.Actors}</div>
    <div class="detalle"><strong>Duración:</strong> ${datos.Runtime}</div>
    <div class="detalle"><strong>Clasificación:</strong> ${datos.Rated}</div>
    <div class="detalle"><strong>Fecha de estreno:</strong> ${datos.Released}</div>
    <div class="detalle"><strong>País:</strong> ${datos.Country}</div>
    <div class="detalle"><strong>Tipo:</strong> ${datos.Type}</div>
    <div class="rating"><strong>Calificación de los usuarios:</strong> ${datos.imdbRating}</div>
    <div class="sinopsis"><strong>Sinopsis:</strong> ${datos.Plot}</div>
  `;

  // Ocultar el mensaje de carga
  loadingElement.classList.add('hidden');
}

function mostrarError(mensaje) {
  informacionPeliculaDiv.innerHTML = `<p style="color: red;">${mensaje}</p>`;
  loadingElement.classList.add('hidden'); // Ocultar el mensaje de carga si ocurre un error
}
