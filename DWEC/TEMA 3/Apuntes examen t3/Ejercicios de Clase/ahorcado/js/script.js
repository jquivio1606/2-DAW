// Contador intentos
var maxIntentos = 5;
// Contador fallos
var contadorFallos = 0;
// Array con todas las palabras del juego
var palabras = ['casa', 'perro', 'gato', 'elefante'];

// Array con el source de todas las imágenes
var imagenes = ['./img/ahorcado0.png', './img/ahorcado1.png', './img/ahorcado2.png', './img/ahorcado3.png', './img/ahorcado4.png', './img/ahorcado5.png'];

// Elegir palabra aleatoria
var palabraElegida = palabras[Math.floor(Math.random() * palabras.length)];
console.log(palabraElegida);

// Cambiar #salida toda la longitud de la palabra por '-'
var palabraGuion = '-'.repeat(palabraElegida.length);
document.getElementById('salida').innerHTML = palabraGuion;

// Inicializar imagen
document.querySelector('#imagen img').src = imagenes[0];

// Tomar el input text letra y el botón para el evento
document.querySelector('#comprobar').addEventListener('click', () => {
    var letra = document.querySelector('#letra').value.toLowerCase();
    if (letra === '') return;

    var letraEncontrada = false;
    var nuevaPalabraGuion = '';

    // Recorrer la palabra
    for (let i in palabraElegida) {
        if (palabraElegida[i] === letra) {
            nuevaPalabraGuion += letra;
            letraEncontrada = true;
        } else {
            nuevaPalabraGuion += palabraGuion[i];
        }
    }

    // Actualizar palabraGuion y el HTML
    palabraGuion = nuevaPalabraGuion;
    document.getElementById('salida').innerHTML = palabraGuion;

    // Si no se encontró la letra, aumentar el contador de fallos
    if (!letraEncontrada) {
        contadorFallos++;
        document.querySelector('#imagen img').src = imagenes[contadorFallos];
        alert(`Has fallado, te quedan: ${maxIntentos - contadorFallos} intentos`);

        if (contadorFallos >= maxIntentos) {
            alert('Has perdido. La palabra era: ' + palabraElegida);
            document.querySelector('#letra').disabled = true;
            document.querySelector('#comprobar').disabled = true;
        }
    }

    // Comprobar si se ha ganado
    if (!palabraGuion.includes('-')) {
        alert('¡Has ganado!');
        document.querySelector('#letra').disabled = true;
        document.querySelector('#comprobar').disabled = true;
    }

    // Limpiar el input
    document.querySelector('#letra').value = '';
});
