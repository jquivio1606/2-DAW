/*var boton=document.getElementById('miimagen');
boton.addEventListener("click", cambiarimagen, false);
*/
function cambiarimagen()
{
    var imagen_cambio = document.getElementById('imagen');
    if (imagen_cambio.scr.match("a.jpg"))
    {
        imagen_cambio.src="./img/b.jpg";
    } else if( imagen_cambio.src.match("b.jpg"))
    {
        imagen_cambio.src="./img/c.jpg";
    } else if( imagen_cambio.src.match("c.jpg"))
    {
        imagen_cambio.src="./img/d.jpg";
    } else
    {
        imagen_cambio.src="./img/a.jpg";
    }
    
}