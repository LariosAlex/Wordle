<?php
        if(isset($_POST['botoJugar'])){
            obtenirParaula('cat5.txt');
        };
        function obtenirParaula($nomArxiu){
            $liniesArxiu = file($nomArxiu);
            $paraules = [];
            foreach($liniesArxiu as $paraula) {
                array_push($paraules, $paraula);
            }
            return $paraules[numeroRandom(0, count($paraules) - 1)];
        }
        function numeroRandom($min, $max){
            return rand($min, $max);
        }

        function generarTaula($w,$h){ //columna - fila
        echo "<table id='taulaParaules'>\n";
        for($i = 0; $i < $h;$i++){
            echo "<tr>\n";
            for($j = 0; $j < $w;$j++){
                echo "<td id='$i$j'></td>\n";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    
    function generarTeclat(){
        $llista = ["Q","W","E","R","T","Y","U","I","O","P","A","S","D","F","G","H","J","K","L","Ç","ENVIAR","Z","X","C","V","B","N","M","ESBORRAR"];
        echo "<div id='teclat'>\n";
        echo "<div id='filaTeclas'>\n";
        foreach($llista as $tecla){
            if($tecla != 'ENVIAR' && $tecla !='ESBORRAR'){
                echo "<button id='tecla' type='button' onclick='afegirLletraParaula(\"$tecla\")'>$tecla</button>\n";
            }else{
                if($tecla == 'ENVIAR'){
                    echo "<form id='formGame' method='post'>\n";
                        echo "<input type='text' id='inputGame' hidden>\n";
                        echo "<input type='submit' id='tecla' type='button' onclick='enviar()' value='$tecla'>\n";
                    echo "</form>\n";

                }elseif($tecla == 'ESBORRAR'){
                    echo "<button id='tecla' type='button' onclick='esborrar()'>$tecla</button>\n";
                }
            }
            if($tecla == "P" || $tecla == "Ç")  {
                echo "</div><br>
                <div id='filaTeclas'>\n";
            }
        }
        echo "</div>";
    }

    function estadistiques($llista){
        if(count($llista['guanyades']) != 0){
            foreach($llista['guanyades'] as $partida => $estadistiques){
                $partida += 1;
                echo "<p>A la partida $partida has guanyat amb ". intval($estadistiques[0])+1 ." intent/os amb un total de ". $estadistiques[1]+ 100 ." punts</p>";
            }
        }else{
            echo "<p>NINGUNA</p>";
        }
        
        $perdudes = $llista['perdudes'];
        echo "<h4>Nº de partides perdudes perdudes: $perdudes </h4>";
    }

    function generarPuntuacio($llista){
        $estadistiquesPartida = explode(",",$llista);
        $puntuacio = 0;
        $multiplicador = 1;
        $ultimaFila = "";
        foreach($estadistiquesPartida as $estadistiquesFila){
            $estadistiquesFila = explode("-",$estadistiquesFila);
            $puntuacio += intval($estadistiquesFila[1]) * $multiplicador * 100;
            $ultimaFila = $estadistiquesFila[0];

            if($estadistiquesFila[0] !=4){
                $multiplicador -= 0.2;
            }else{
                $multiplicador -= 0.1;
            }
        }
        return [$ultimaFila,$puntuacio];
    }
    ?>
