const baseUrl = "https://pokeapi.co/api/v2/pokemon/";

const infoDiv = document.getElementById("pokemonInfo");

const tableBody = document.getElementById("pokemonTableBody");
const tableHead = document.getElementById("pokemonTableHead");

// Obtener Pokémon por ID
function getAxiosPokemonPorId() {
    let id = document.getElementById("pokemonId").value;
    if (!id) {
        infoDiv.innerHTML = '<p class="text-danger">Por favor, ingrese un ID válido.</p>';
        return;
    }

    axios.get(`${baseUrl}${id}`)
        .then(response => {
            let data = response.data;
            let tipos = data.types.map(tipo => tipo.type.name).join(', ');
            let estadisticas = data.stats.map(est => `${est.stat.name}: ${est.base_stat}`).join(', ');

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
            infoDiv.innerHTML = '<p class="text-danger">Pokémon no encontrado.</p>';
        });
}

//Borrar Pokemon
function borrarPokemon() {
    infoDiv.innerHTML = "";
}


// Obtener lista de 20 Pokémon ordenados por ID
function getAxiosTodosPokemons() {
    tableBody.innerHTML = "";
    tableHead.innerHTML = `
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Tipo</th>
            <th>Imagen</th>
        </tr>`;

    axios.get(`${baseUrl}?limit=20`)
        .then(response => {
            let promises = response.data.results.map(pokemon => axios.get(pokemon.url));

            Promise.all(promises)
                .then(results => {
                    let pokemons = results.map(res => res.data);

                    // Ordenar por ID
                    pokemons.sort((a, b) => a.id - b.id);

                    // Insertar en la tabla
                    pokemons.forEach(pokeData => {
                        let tipos = pokeData.types.map(tipo => tipo.type.name).join(', ');

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
                        tableBody.innerHTML += row;
                    });
                });
        })
        .catch(error => {
            tableBody.innerHTML = '<tr><td colspan="7" class="text-danger">Error al cargar los Pokémon.</td></tr>';
        });
}

//Borrar la tabla
function borrarTabla() {
    tableHead.innerHTML = "";
    tableBody.innerHTML = "";
}
