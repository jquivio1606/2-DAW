// Definir la URL base de la API de Pokémon
const baseUrl = "https://pokeapi.co/api/v2/pokemon/";

// Obtener los elementos del DOM donde se mostrará la información del Pokémon y la tabla de Pokémon
const infoDiv = document.getElementById("pokemonInfo");
const tableBody = document.getElementById("pokemonTableBody");
const tableHead = document.getElementById("pokemonTableHead");

// Función para obtener un Pokémon por su ID
function getAxiosPokemonPorId() {
    let id = document.getElementById("pokemonId").value; // Obtener el ID del Pokémon desde el campo de entrada
    if (!id) {
        // Si no se ha ingresado un ID, mostrar un mensaje de error
        infoDiv.innerHTML = '<p class="text-danger">Por favor, ingrese un ID válido.</p>';
        return;
    }

    // Realizar la solicitud GET a la API para obtener los datos del Pokémon
    axios.get(`${baseUrl}${id}`)
        .then(response => {
            let data = response.data; // Obtener los datos de la respuesta
            // Mapear los tipos y estadísticas del Pokémon
            let tipos = data.types.map(tipo => tipo.type.name).join(', ');
            let estadisticas = data.stats.map(est => `${est.stat.name}: ${est.base_stat}`).join(', ');

            // Mostrar la información del Pokémon en el DOM
            infoDiv.innerHTML = `
                <h3>${data.name.toUpperCase()}</h3>
                <img src="${data.sprites.front_default}" alt="${data.name}">
                <p><strong>ID:</strong> ${data.id}</p>
                <p><strong>Altura:</strong> ${data.height}</p>
                <p><strong>Peso:</strong> ${data.weight}</p>
                <p><strong>Tipo:</strong> ${tipos}</p>
                <p><strong>Estadísticas:</strong> ${estadisticas}</p>
            `;
        })
        .catch(error => {
            // Mostrar un mensaje de error si el Pokémon no se encuentra
            infoDiv.innerHTML = '<p class="text-danger">Pokemon no encontrado.</p>';
        });
}

// Función para borrar la información del Pokémon
function borrarPokemon() {
    infoDiv.innerHTML = ""; // Limpiar el contenido de la información del Pokémon
}

// Función para obtener una lista de 20 Pokémon ordenados por ID
function getAxiosTodosPokemons() {
    tableBody.innerHTML = ""; // Limpiar el contenido de la tabla
    // Insertar el encabezado de la tabla
    tableHead.innerHTML = `
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Tipo</th>
            <th>Imagen</th>
        </tr>`;

    // Realizar la solicitud GET a la API para obtener una lista de 20 Pokémon
    axios.get(`${baseUrl}?limit=20`)
        .then(response => {
            // Crear un array de promesas para obtener los detalles de cada Pokémon
            let promises = response.data.results.map(pokemon => axios.get(pokemon.url));

            // Esperar que todas las promesas se resuelvan
            Promise.all(promises)
                .then(results => {
                    let pokemons = results.map(res => res.data); // Obtener los datos de los Pokémon

                    // Ordenar los Pokémon por ID
                    pokemons.sort((a, b) => a.id - b.id);

                    // Insertar los Pokémon ordenados en la tabla
                    pokemons.forEach(pokeData => {
                        let tipos = pokeData.types.map(tipo => tipo.type.name).join(', '); // Obtener los tipos del Pokémon

                        let row = `
                            <tr>
                                <td>${pokeData.id}</td>
                                <td>${pokeData.name.toUpperCase()}</td>
                                <td>${pokeData.height}</td>
                                <td>${pokeData.weight}</td>
                                <td>${tipos}</td>
                                <td><img src="${pokeData.sprites.front_default}" alt="${pokeData.name}"></td>
                            </tr>
                        `;
                        tableBody.innerHTML += row; // Añadir una fila con los datos del Pokémon a la tabla
                    });
                });
        })
        .catch(error => {
            // Si ocurre un error al cargar los Pokémon, mostrar un mensaje de error en la tabla
            tableBody.innerHTML = '<tr><td colspan="7" class="text-danger">Error al cargar los Pokemon.</td></tr>';
        });
}

// Función para borrar la tabla de Pokémon
function borrarTabla() {
    tableHead.innerHTML = ""; // Limpiar el encabezado de la tabla
    tableBody.innerHTML = ""; // Limpiar el cuerpo de la tabla
}
