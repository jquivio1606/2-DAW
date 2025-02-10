let contador= 0;
function aumentarContador(){
    contador++;
    postMessage(contador);
    setTimeout(aumentarContador,1000);
}
aumentarContador();