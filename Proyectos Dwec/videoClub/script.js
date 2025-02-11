const APIKEY = "13a90d5f"
let boton = document.getElementById("btn");

let carga = document.getElementById("cargando");

boton.addEventListener("click", async () => {
  var tituloPelicula = document.getElementById("titulo_peli").value;

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
    contenedorDatos.innerHTML = `
    <h2>${datos.Title} - (${datos.Year})</h2>
  
    <div class="cont1>
      <img id="poster" class="poster" src=${datos.Poster} alt="Poster de la peli: ${datos.Title}> 
    </div>

    <div class="cont2>
      <div id="genre" class="detalle"><strong>Género:</strong> ${datos.Genre}</div>
      <div id="type" class="detalle"<strong>Tipo:</strong> ${datos.Type}</p>
      <div id="runtime" class="detalle"><strong>Duración:</strong> ${datos.Runtime}</>
      <div id="actors" class="detalle"><strong>Reparto:</strong> ${datos.Actors}</div>
    </div>
      <div class="cont3>
        <div id="director" class="detalle"><strong>Director/es:</strong> ${datos.Director}</div>
        <div id="writer" class="detalle"><strong>Escritor/es:</strong> ${datos.Writer}</div>
        <div id="rated" class="detalle"><strong>Clasificación:</strong> ${datos.Rated}</div>
        <div id="imdbRating" class="detalle"><strong>Calificación de los usuarios:</strong> ${datos.imdbRating}</div>
        <div id="language" class="detalle"><strong>Idioma:</strong> ${datos.Language}</div>
      </div>
      <div class="cont4>
        <div id="plot" class="detalle"><strong>Sinopsis:</strong> ${datos.Plot}</div>    
      </div>
    `;
  } else {
    contenedorDatos.innerHTML = `
    <h2>${datos.Title} - (${datos.Year})</h2>
      <div id="genre" class="detalle"><strong>Género:</strong> ${datos.Genre}</div>
      <div id="type" class="detalle"<strong>Tipo:</strong> ${datos.Type}</p>
      <div id="runtime" class="detalle"><strong>Duración:</strong> ${datos.Runtime}</>
      <div id="actors" class="detalle"><strong>Reparto:</strong> ${datos.Actors}</div>
      <div id="director" class="detalle"><strong>Director/es:</strong> ${datos.Director}</div>
      <div id="writer" class="detalle"><strong>Escritor/es:</strong> ${datos.Writer}</div>
      <div id="rated" class="detalle"><strong>Clasificación:</strong> ${datos.Rated}</div>
      <div id="imdbRating" class="detalle"><strong>Calificación de los usuarios:</strong> ${datos.imdbRating}</div>
      <div id="language" class="detalle"><strong>Idioma:</strong> ${datos.Language}</div>
      <div id="plot" class="detalle"><strong>Sinopsis:</strong> ${datos.Plot}</div>
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

