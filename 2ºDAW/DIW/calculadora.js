const pantalla=document.querySelector(".pantalla");
const botones=document.querySelectorAll('button');
console.log(pantalla);
console.log(botones);
let calculos=[];
function calcular(boton)
{
    const valor=boton.textContent;
    if(valor=="Borrar")
    {
        calculos=[];
        pantalla.textContent=".";
    } else if (valor=="=")
    {
        pantalla.textContent=eval(acumulados);
    }
    else{
        calculos.push(valor);
        acumulados=calculos.join("");
        pantalla.textContent=acumulados;
    }
}
botones.forEach((button)=>
    button.addEventListener("click",()=>calcular(button)));