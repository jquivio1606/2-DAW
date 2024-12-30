var boton= document.getElementById("calcular");
boton.addEventListener("click", calculo, false);

function calculo(){

    var radio= parseFloat(document.getElementById("radio").value);
    var area= Math.PI*(radio**2);
    var longitud= (2*Math.PI)*radio;

    document.getElementById("area").innerHTML= "El área del circulo es: " + area.toFixed(2);
    document.getElementById("longitud").innerHTML= "La longitud del circulo es: " + longitud.toFixed(2);

}