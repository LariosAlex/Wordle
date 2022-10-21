<?php
        if(isset($_POST['botoJugar'])){
            obtenirParaula('cat5.txt');
        };

        function nouIdioma($idioma){
            $_GET['idioma'] == $idioma;
        }

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
    function llistaParaulesIdioma($idioma){
        $liniesArxiu = file($idioma.'Teclat.txt');
        $tecles = [];
        foreach($liniesArxiu as $tecla) {
            $tecles = explode(",", $tecla);
        }
        return $tecles;
    }
    function generarTeclat(){
        $llista = llistaParaulesIdioma($_SESSION['idioma']);
        echo "<div id='teclat'>";
        echo "<div id='filaTeclas'>";
        foreach($llista as $tecla){
            if($tecla == 'ENVIAR' || $tecla == 'SEND'){
                echo "</div><br><div id='filaTeclas'>\n";
                echo "<button id='tecla' type='button' onclick='enviar()'>$tecla</button>\n";
            }elseif($tecla == 'ESBORRAR' || $tecla == 'BORRAR' || $tecla == 'BACK'){
                echo "<button id='tecla' type='button' onclick='esborrar()'>$tecla</button>\n";
            }else{
                echo "<button id='tecla' type='button' onclick='afegirLletraParaula(\"$tecla\")'>$tecla</button>\n";
                if($tecla == "P")  {
                    echo "</div><br>
                    <div id='filaTeclas'>\n";
                }
            }
        }
        echo "</div>";
    }
    ?>
