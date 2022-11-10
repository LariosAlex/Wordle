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

function canviarMode(){
    // Definiu aqui el vostre codi
    enviarColorAlInput();
    document.body.classList.toggle("dark-mode");
  }

function enviarColorAlInput(){
    let style = mirarColor();
    document.getElementById('colorDeTema').value = style;    
}

function mirarColor(){
    let colorDeBody = document.getElementById('body');
    let style = getComputedStyle(colorDeBody).backgroundColor;
    if(style == 'rgb(214, 214, 177)'){
        return "light";
    }else{
        return "dark";
    }
}

function compararColor(){
    let colorPaginaAnterior = document.getElementById("colorAnterior").innerHTML;
    let colorActual = mirarColor();
    if(colorActual != colorPaginaAnterior){
        canviarMode();
    }
}

function compararColorExecutarSo(so){
    compararColor();
    executarSo(so);
}

function cambiarPantallaSubmit(){
    enviarColorAlInput();
    document.formInici.submit();
}