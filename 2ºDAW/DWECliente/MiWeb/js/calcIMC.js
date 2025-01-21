var boton = document.getElementById('calcular2');
boton.addEventListener("click", calculo, false);
function calculo(){
 var radio = document.getElementById('radio').value;
  document.getElementById('longitud').innerHTML = 2 * Math.PI * radio + " longitud";
  document.getElementById('area').innerHTML = Math.PI * radio * radio + " area";
}
let texto= "123456789";
let patron = /[^1-4]/g;
let resultado = texto.match(patron);
console.log(resultado);