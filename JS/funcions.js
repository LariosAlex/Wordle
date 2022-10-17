var paraula ="";
function palabras(){
    var files = document.getElementById("taulaParaules").rows.length;
    let paraules = [];
    for(let i = 0; i < files; i++){
        var columnes = document.getElementById("taulaParaules").rows[i].cells.length;
        let paraulaFila = "";
        for(let j = 0; j < columnes; j++){
            paraulaFila = paraulaFila + document.getElementById(String(i)+String(j)).innerHTML;
        }
        if(paraulaFila.length == 5){
            paraules.push(paraulaFila);
        }
    }
    alert(paraules.length);
    return paraules;
}
function escriuLletra(lletra) {
    var files = document.getElementById("taulaParaules").rows.length;
    for(let i = 0; i < files; i++){
        var columnes = document.getElementById("taulaParaules").rows[i].cells.length;
        for(let j = 0; j < columnes; j++){
            casilla =  document.getElementById(String(i)+String(j));
            if(casilla.innerHTML == ""){
                casilla.innerHTML = lletra;
                j = columnes;
                i = files;
            }
        }
    }
};

function afegirLletraParaula(lletra){
    if(paraula.length < 5){
        paraula += lletra;
        escriuLletra(lletra)
    }
}