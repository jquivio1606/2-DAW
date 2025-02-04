const APIKEY = "13a90d5f"
let boton = document.getElementById("btn");

boton.addEventListener("click", async () => {
  var tituloPelicula = document.getElementById("titulo_peli").value;
  let contenedorDatos = document.getElementById("cont-datos");
  let carga = document.getElementById("cargando");

  let titulo = document.getElementById("title");
  let genero = document.getElementById("genre");
  let tipo = document.getElementById("type");
  let duracion = document.getElementById("runtime");
  let actores = document.getElementById("actors");
  let director = document.getElementById("director");
  let escritor = document.getElementById("writer");
  let idioma = document.getElementById("language");
  let anio = document.getElementById("year");


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

      titulo.innerHTML= "<b>Titulo: </b>"+ respuesta.data.Title;





      setTimeout(() => {
        if (datos.Response == 'True') {








        } else {
          contenedorDatos.innerHTML = ""; 
          let error = document.createElement("h3");
          error.textContent = "No se encontró la película";
          contenedorDatos.appendChild(error);
        }

        carga.hidden = true;
      }, 2000);

    })
    .catch((err) => {
      console.log(err);
    });

})
