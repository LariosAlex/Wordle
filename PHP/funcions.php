
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
        function generarTaula($w,$h){
        echo "<table>\n";
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
        echo "<table>\n
            <tr>\n";
        foreach($llista as $tecla){
            if($tecla == "ENVIAR"){
                echo "<td id='$tecla' colspan=2><button onclick='enviar()'>$tecla</button></td>\n";
            }else if ($tecla == "ESBORRAR"){
                echo "<td id='$tecla' colspan=2><button onclick='esborrar()'>$tecla</button></td>\n";
            }else{
                echo "<td id='$tecla'>$tecla</td>\n";
            }
            
            if ($tecla == "P"){
                echo "</tr>\n<tr>\n";
            }else if($tecla == "Ç"){
                echo "</tr>\n</table>\n<table>\n";
            }

            
        }
        echo "</tr>\n</table>\n";
    }

    ?>
