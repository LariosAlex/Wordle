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
        echo "<div id='teclat'>";
        echo "<div id='filaTeclas'>";
        foreach($llista as $tecla){
            if($tecla != 'ENVIAR' && $tecla !='ESBORRAR'){
                echo "<button id='tecla' type='button' onclick='afegirLletraParaula(\"$tecla\")'>$tecla</button>\n";
            }else{
                if($tecla == 'ENVIAR'){
                    echo "<button id='tecla' type='button' onclick='enviar()'>$tecla</button>\n";
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
    ?>
