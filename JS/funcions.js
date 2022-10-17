
window.onload=function (){


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

    
    function revisarParaula(fila){
        let paraulaSecreta = document.getElementById("paraulaSecreta").innerHTML;
        let diccionariContadorLletresSecreta = crearDiccionariContadorLletres(paraulaSecreta);
        for(vuelta=0;vuelta<=1;vuelta++){
            for(i=0;i<=4;i++){
                let selector = String(fila)+i;
                let lletraSeleccionada = document.getElementById(selector).innerHTML;

                if(lletraSeleccionada == paraulaSecreta[i]){
                    document.getElementById(selector).style.backgroundColor ="green";
                    diccionariContadorLletresSecreta[lletraSeleccionada] -= 1;
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
    }
    revisarParaula(0);
}




