
let fila = 0;
var paraula ="";

function afegirLletraParaula(lletra){
    if(paraula.length < 5){
        paraula += lletra;
        escriuParaula(paraula)
    }
}

function nouIidioma(){
    //var radios = document.getElementsByName("idioma");
    //var selected = Array.from(radios).find(radio => radio.checked);
    //window(selected.value);
    window('Entra');
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
        //document.getElementById('resultat').style.display ="block";
        //document.getElementById('resultat').innerHTML = "HAS GUANYAT!!";
        window.location.href = "win.php";
        fila = 6;
    }else if(filaActual == 5){
        //document.getElementById('resultat').style.display ="block";
        //document.getElementById('resultat').innerHTML = "HAS PERDUT!!\n<br>La paraula secreta era "+document.getElementById('paraulaSecreta').innerHTML;
        window.location.href = "lose.php";
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
                if(vuelta==0){
                    diccionariContadorLletresSecreta[lletraSeleccionada] -= 1;
                }                if (vuelta==0){
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
