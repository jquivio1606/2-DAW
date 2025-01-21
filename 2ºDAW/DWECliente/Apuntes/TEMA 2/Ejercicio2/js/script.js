/*var boton=document.getElementById('miimagen');

boton.addEventListener("click", cambiarImagen, false);
*/
function cambiarImagen() {
    var imagenCambio = document.getElementById('imagen');
    // Extrae solo el nombre del archivo de la URL
    var srcActual = imagenCambio.src.split("/").pop();
    
    if (srcActual === "a.jpg") {
        imagenCambio.src = "./img/b.jpg";
    } else if (srcActual === "b.jpg") {
        imagenCambio.src = "./img/c.jpg";
    } else if (srcActual === "c.jpg") {
        imagenCambio.src = "./img/d.jpg";
    } else {
        imagenCambio.src = "./img/a.jpg";
    }

}