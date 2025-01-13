/*    EJEMPLO DE EJERCICIO DEL TEMA 4  (EXAMEN)    */

document.addEventListener('DOMContentLoaded', () => {

    const spanResult = document.getElementById("resultado");
    let resultado = 0;

    const huecos = document.querySelectorAll(".hueco"); // Obtiene todos los 

    function mostrarTopo() {
        //Crear el topo
        const topo = document.createElement('div'); // Crear un div
        topo.classList.add('topo'); // Agregar clase
        topo.style.display = 'block'; // Para que se muestre el topo por encima de los huecos

        const huecoRandomIndex = Math.floor(Math.random() * huecos.length); // Coge un indice aleatorio de entre 0 y 8
        const huecoElegido = huecos[huecoRandomIndex]; //Con ese indice obtenemos el hueco

        huecoElegido.appendChild(topo); //Pones el div que has creado (TOPO), y le pone en el hueco aleatorio obtenido
        topo.style.display = 'block';

        topo.addEventListener('click', () => { //Se añade un evento al topo para que cuando se haga click sume 1 punto.
            resultado++;
            spanResult.textContent=resultado;
            topo.remove; // Tras hacer click se elimina el topo
        });
        
        setTimeout(()=>{ //Se añade un timeout para borrar el topo cada segundo y medio para que se genere en otro lugar
            topo.remove();
        }, 1500);
    }

    function comenzar(){ // Funcion para empezar el programa
        setInterval(mostrarTopo, 1500); // Cada segundo y medio se reinicia el juego
    }
    comenzar(); // Empieza el juego
});