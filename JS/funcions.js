let palabra = "hacer";
let fila = 0;
function escriuParaula(par){
    for(let i = 0;i < 5;i++){
        let identificador = String(fila)+String(i);
        let lletra = par[i]
        if(i <= par.length-1){
            document.getElementById(identificador).innerHTML = lletra
        }else{
            document.getElementById(identificador).innerHTML = ""
        }
        
    }
}
escriuParaula(palabra);

function esborrar(){
    palabra = palabra.substring(0,palabra.length-1);
    escriuParaula(palabra);
}
function enviar(){
    if(palabra.length === 5){
        fila += 1;
        palabra = "";
    }
}