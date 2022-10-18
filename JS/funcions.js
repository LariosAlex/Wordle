
let fila = 0;
var paraula ="";
/*
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
*/

function afegirLletraParaula(lletra){
    if(paraula.length < 5){
        paraula += lletra;
        escriuParaula(paraula)
    }
}




function crearDiccionariContadorLletres(paraula){
    resultat = {};
    for(i=0;i<=4;i++){
        let arrayKeysResultat = Object.keys(resultat);
        resultat[paraula[i]]=0;
        for(k=0;k<=4;k++){
            if(paraula[i]==paraula[k]){
                resultat[paraula[i]]+=1;
            }
        }  
    }
    return resultat;
}

function resultatPartida(contador,filaActual){
    if (contador==5){
        document.getElementById('resultat').style.display ="block";
        document.getElementById('resultat').innerHTML = "HAS GUANYAT!!";
        fila = 6;
    }else if(filaActual == 5){
        document.getElementById('resultat').style.display ="block";
        document.getElementById('resultat').innerHTML = "HAS PERDUT!!\n<br>La paraula secreta era "+document.getElementById('paraulaSecreta').innerHTML;
    }
}

function revisarParaula(filaActual){
    let paraulaSecreta = (document.getElementById("paraulaSecreta").innerHTML).toUpperCase();
    let diccionariContadorLletresSecreta = crearDiccionariContadorLletres(paraulaSecreta);
    let letrasCorrectes = 0;
    for(vuelta=0;vuelta<=1;vuelta++){
        for(i=0;i<=4;i++){
            let selector = String(filaActual)+String(i);
            let lletraSeleccionada = document.getElementById(selector).innerHTML;

            if(lletraSeleccionada == paraulaSecreta[i]){
                document.getElementById(selector).style.backgroundColor ="green";
                diccionariContadorLletresSecreta[lletraSeleccionada] -= 1;
                if (vuelta==0){
                    letrasCorrectes += 1;   
                }
            }else if(paraulaSecreta.includes(lletraSeleccionada) && diccionariContadorLletresSecreta[lletraSeleccionada]>0){
                document.getElementById(selector).style.backgroundColor ="yellow";
                if(vuelta==1){
                    diccionariContadorLletresSecreta[lletraSeleccionada] -= 1;
                }
            }else{
                document.getElementById(selector).style.backgroundColor ="grey";
            }
        }
    }
    setTimeout(resultatPartida(letrasCorrectes,filaActual),5000);
}





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

function esborrar(){
    paraula = paraula.substring(0,paraula.length-1);
    escriuParaula(paraula);
}
function enviar(){
    if(paraula.length === 5){
        revisarParaula(fila);
        fila += 1;
        paraula = "";
    }
}
