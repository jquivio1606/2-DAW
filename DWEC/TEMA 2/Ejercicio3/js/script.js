
function cambiarIdioma(idioma) {
    let mensaje = '';

    switch(idioma) {
        case 'espanol':
            mensaje = '¡Hola!';
            break;
        case 'ingles':
            mensaje = 'Hello!';
            break;
        case 'ruso':
            mensaje = 'Привет!';
            break;
        default:
            mensaje = 'Idioma no soportado';
    }

    alert(mensaje);
}