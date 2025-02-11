const APIKEY = "13a90d5f"
let boton = document.getElementById("btn");

let carga = document.getElementById("cargando");

boton.addEventListener("click", async () => {
  var tituloPelicula = document.getElementById("titulo_peli").value;

  contenedorDatos.innerHTML = ""; // Limpia resultados anteriores
  contenedorDatos.className = ""; // Elimina clases anteriores

  await axios.get("http://www.omdbapi.com/", {
    params: {
      apikey: APIKEY,
      t: tituloPelicula,
      plot: "full"
    },
  })
    .then((respuesta) => {
      console.log(respuesta)
      const datos = respuesta.data;
      carga.hidden = false;

      setTimeout(() => {
        if (datos.Response == 'True') {
          mostrarInformacionPelicula(datos);
        } else {
          mostrarError("No se encontró la película. Intenta con otro título");
        }
      }, 2000);

    })
    .catch((err) => {
      mostrarError("Ha ocurrido el error: " + err + ". Intentelo más tarde");
    });

})

let contenedorDatos = document.getElementById("cont-datos");

function mostrarInformacionPelicula(datos) {

  if (datos.Poster !== "N/A") {
    contenedorDatos.classList.add("con-poster");
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


  carga.hidden = true;

}

function mostrarError(msjError) {
  contenedorDatos.innerHTML = "";
  let contError = document.createElement("h3");
  contError.textContent = msjError;
  contenedorDatos.appendChild(contError);
}

