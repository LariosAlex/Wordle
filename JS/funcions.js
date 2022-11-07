let fila = 0;
var paraula ="";
const soError = new Audio('../SRC/soError.mp3');
const soExit = new Audio('../SRC/soGuanyar.mp3');
const soPerdre = new Audio('../SRC/soPerdida.mp3');

function carregarParaulaSecreta(){
    let paraula = document.getElementById("paraulaSecreta").innerHTML.toUpperCase();
    return paraula;
}

var paraulaSecreta = carregarParaulaSecreta();

var partidaActual = [];

var segons = 0;
var minuts = 0;
var hores = 0;

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

function resultatPartida(encerts,filaActual){
    if (encerts==5){
        document.getElementById("formGame").setAttribute("action", "win.php");
        document.getElementById("formGame").setAttribute("onsubmit", "return true");
        fila = 6;
    }else if(filaActual == 5){
        document.getElementById("formGame").setAttribute("action", "lose.php");
        document.getElementById("formGame").setAttribute("onsubmit", "return true");
    }else{
        document.getElementById("formGame").setAttribute("onsubmit", "return false");
    }

    let identificador = String(filaActual)+4;
    let valor = document.getElementById(identificador).innerHTML;
    if( valor != undefined || valor != null){
        partidaActual.push([filaActual+"-"+encerts]);
    }
    document.getElementById("inputGame").setAttribute("name", "estadistiques");
    document.getElementById('inputGame').value = partidaActual;
    document.getElementById('temps').value = hores+":"+minuts+":"+segons;

}

function executarSo(resultat){
    if(resultat == 'perdida'){
        soPerdre.play();
    } else if(resultat == 'guanyada'){
        soExit.play();
    }
}

function revisarParaula(filaActual){
    let diccionariContadorLletresSecreta = crearDiccionariContadorLletres(paraulaSecreta);
    let letrasCorrectes = 0;
    let stringInsertado = "";
    for(vuelta=0;vuelta<=1;vuelta++){
        for(i=0;i<=4;i++){
            let selector = String(filaActual)+String(i);
            let lletraSeleccionada = document.getElementById(selector).innerHTML;

            if(lletraSeleccionada == paraulaSecreta[i]){
                document.getElementById(selector).style.backgroundColor ="green";
                if(vuelta==0){
                    diccionariContadorLletresSecreta[lletraSeleccionada] -= 1;
                    letrasCorrectes += 1;
                }else if(vuelta == 1){
                    stringInsertado += lletraSeleccionada;
                }
            }else if(paraulaSecreta.includes(lletraSeleccionada) && diccionariContadorLletresSecreta[lletraSeleccionada]>0){
                document.getElementById(selector).style.backgroundColor ="yellow";
                if(vuelta==1){
                    diccionariContadorLletresSecreta[lletraSeleccionada] -= 1;
                    stringInsertado += lletraSeleccionada;
                }
            }else{
                document.getElementById(selector).style.backgroundColor ="grey";
                if (vuelta==1){
                    stringInsertado += lletraSeleccionada;
                }
            }
        }
    }
    if(paraulaSecreta!=stringInsertado){
        soError.play();
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
    }else{
        //resultatPartida(0,fila)
        document.getElementById("formGame").setAttribute("onsubmit", "return false");
    }
}

function inici () {
    control = setInterval(cronometre,1000);
}
    
function cronometre () {
    if (segons < 59) {
        segons ++;
        if (segons < 10) { segons = "0"+segons }
        Segons.innerHTML = ":"+segons;
    }
    if (segons == 59) {
        segons = -1;
    }
    if ( (segons == 0) ) {
        minuts++;
        if (minuts < 10) { minuts = "0"+minuts }
        Minuts.innerHTML = minuts;
    }
    if (minuts == 59) {
        minuts = -1;
    }
    if ( (segons == 0) && (minuts == 0) ) {
        hores++;
        if (hores < 10) { hores = "0"+hores }
        Hores.innerHTML = hores;
    }
}

function canviarVisibilitatPopup(){
    popup = document.getElementById("popupReset");
    if(popup.style.display == "grid"){
        popup.style.display = "none"
    }else{
        popup.style.display = "grid"
    }
}
