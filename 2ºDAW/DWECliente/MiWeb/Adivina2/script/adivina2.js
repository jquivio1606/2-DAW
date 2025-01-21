//Obtenemos todas las variables que necesitemos del html
    var numIntentos=0;
    var intentos=document.getElementById("intentos");
    var numeroTeclado=document.getElementById("numero");
    var btnAdivinar=document.getElementById("btnAdivinar");
    var btnReiniciar=document.getElementById("btnReiniciar");
    var mensaje=document.getElementById("mensaje");
//Creamos las variables para la ejecución del programa
    var numeroSecreto=0;
    var minimo=1;
    var maximo=10;
//Función para iniciar el programa
function iniciar(){
    numIntentos=0;
    intentos.textContent=numIntentos;
    btnAdivinar.disabled=false;
    numeroTeclado.disabled=false;
    numeroTeclado.value="";
    mensaje.textContent="";
    numeroSecreto=Math.round(Math.random()*(maximo-minimo)+minimo);
    console.log(numeroSecreto,numIntentos,numeroTeclado);
}
//Función para terminar
function terminar(){
    numeroTeclado.disabled = true;
    btnAdivinar.disabled = true;
}
//Función para adivinar el número
function adivinar(){
    //Contamos los intentos
    numIntentos++;
    intentos.textContent=numIntentos;
    //comprobamos que es un numero isNaN o esta entre minimo y maximo
    if(isNaN(numeroTeclado.value)||numeroTeclado.value>maximo||numeroTeclado.value<minimo){
        alert("Teclea un número entre 1 y 10");
        numeroTeclado.value="";
    }else{
        if(numIntentos<=5 || numeroTeclado.value != numeroSecreto){
            if(numeroTeclado.value==numeroSecreto){
                mensaje.textContent="Has acertado!";
                terminar();
            }else if(numeroTeclado.value>numeroSecreto){
                mensaje.textContent="El número es menor";
            }else{
                mensaje.textContent="El número es mayor";
            }
        }else{
            mensaje.textContent="Has agotado todos los intentos. Dale a reiniciar para volver a intentarlo"
            mensaje.innerHTML+= "<br>El numero secreto era: "+numeroSecreto;
            terminar();
        }
    }
}
//Crear los eventos a los botones
btnAdivinar.addEventListener("click",adivinar,false);
btnReiniciar.addEventListener("click",iniciar,false);