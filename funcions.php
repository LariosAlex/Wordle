<?php
    if( $_SESSION['idioma'] == 'ca' or (!isset( $_SESSION['idioma']))){
        include('./lang/lang_ca.php');
    }else if( $_SESSION['idioma'] == 'es'){
        include('./lang/lang_es.php');
    }else if( $_SESSION['idioma'] == 'en'){
        include('./lang/lang_en.php');
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

    function idioma($idioma, $pagina){
        $contPagina = [];
        $paginaActual = false;
        $paginaUpper = strtoupper($pagina);
        if ($file = fopen("./".$idioma."Instruccions.txt", "r")) {
            while(!feof($file)) {
                $line = fgets($file);
                if($line == "//$pagina//"){
                    $paginaActual = false;
                    echo '<script>alert("...FALSE...")</script>';
                }
                if($paginaActual == true){
                    $liniaActual = explode("-->", $line);
                    $contPagina = [$liniaActual[0] => $liniaActual[1]];
                }
                if($line == "--INDEX--"){
                    echo '<script>alert("...TRUE...")</script>';
                    $paginaActual = true;
                }
            }
            fclose($file);
        } 
        return $contPagina;
    }

    function llistaParaulesIdioma($idioma){
        if( $_SESSION['idioma'] == 'ca' or (!isset( $_SESSION['idioma']))){
            include('./lang/lang_ca.php');
        }elseif( $_SESSION['idioma'] == 'es'){
            include('./lang/lang_es.php');
        }elseif( $_SESSION['idioma'] == 'en'){
            include('./lang/lang_en.php');
        }  
        $tecles = explode(",", $game['teclat']);
        return $tecles;
    }

    function generarTeclat(){
        $llista = llistaParaulesIdioma($_SESSION['idioma']);
        echo "<div id='teclat'>";
        echo "<div id='filaTeclas'>";
        foreach($llista as $tecla){
            if($tecla == 'ENVIAR' || $tecla == 'SEND'){
                echo "</div><br><div id='filaTeclas'>\n";
                echo "<form id='formGame' method='post' name='enviarDatos'>\n";
                echo "<input type='text' name='estadistiques' id='inputGame' hidden>\n";
                echo "<input type='text' name='temps' id='temps' hidden>\n";
                echo "<input type='submit' id='tecla' class='tecla' type='button' onclick='enviar()' value='$tecla'>\n";
                echo "</form>\n";
            }elseif($tecla == 'ESBORRAR' || $tecla == 'BORRAR' || $tecla == 'BACK'){
                echo "<button id='tecla' class='tecla' type='button' onclick='esborrar()'>$tecla</button>\n";
            }else{
                echo "<button id='$tecla' class='tecla' type='button' onclick='afegirLletraParaula(\"$tecla\")'>$tecla</button>\n";
            }
            if($tecla == "P")  {
                echo "</div><br>
                <div id='filaTeclas'>\n";
            }
        }
        echo "</div>";
    }

    function afegirPartida($resumPartida){
        $arrayPartida = explode(",",$resumPartida);
        
        $partidaActual = [];
        foreach($arrayPartida as $FilaIntents){
            $arrayResumIntents = explode("-",$FilaIntents);
            array_push($partidaActual,$arrayResumIntents);
        }
        $partidaActual['modo'] = $_SESSION['modo'];
        $partidaActual['temps'] = $_POST['temps'];
        array_push($_SESSION['totalPartides'],$partidaActual);
    }

    function calculPuntuacioTemps($stringTemps){
        if($_SESSION['modo'] == 'normal'){
            $punts = 500;
            $stringTemps = explode(":",$stringTemps);
            $punts -= ((int)$stringTemps[1] * 60) + (int)$stringTemps[2];
        }elseif($_SESSION['modo'] == 'crono'){
            $punts = 0;
            $stringTemps = explode(":",$stringTemps);
            $punts += (((int)$stringTemps[1] * 60) + (int)$stringTemps[2]) * 5;
        }
        if($punts < 0){
            $punts = 0;
        }
        return $punts;
    }

    function mostrarPartides(){
        if( $_SESSION['idioma'] == 'ca' or (!isset( $_SESSION['idioma']))){
            include('./lang/lang_ca.php');
        }elseif( $_SESSION['idioma'] == 'es'){
            include('./lang/lang_es.php');
        }elseif( $_SESSION['idioma'] == 'en'){
            include('./lang/lang_en.php');
        }   
        echo "<table id='estadistiquesGenerals'>\n<tr>\n
        <th>". $fiPartida['partida'] ."</th>\n
        <th>". $fiPartida['intents'] ."</th>\n
        <th>". $fiPartida['punts'] ."</th>\n
        </tr>\n";
        for($p = 0; $p < count($_SESSION['totalPartides']); $p++){
            if($_SESSION['totalPartides'][$p]['modo'] == $_SESSION['modo']){
                echo "<tr>\n";
                $puntuacio = 0;
                $fila = 0;
                foreach($_SESSION['totalPartides'][$p] as $intentos){
                    if($intentos != $_SESSION['totalPartides'][$p]['temps'] && $intentos != $_SESSION['totalPartides'][$p]['modo']){
                        $fila = ((int)$intentos[0])+1;
                        $encert = (int)$intentos[1];
                        $puntuacio += calculPuntuacio($fila,$encert);
                    }
                }
                $puntuacio += calculPuntuacioTemps($_SESSION['totalPartides'][$p]['temps']);
                if($fila == 6 && $encert != 5){
                    $puntuacio = 0;
                }
                echo "<td>".($p+1)."</td>\n";
                echo "<td>".$fila."</td>\n";
                echo "<td>$puntuacio</td>\n";
                echo "</tr>\n";
            }
        }
        echo "</table>\n";

        echo "<br>\n<table id='resultatPartides'>\n";
        echo "<tr>\n";
        echo "<th>". $fiPartida['pGuanyades'] ."</th>\n";
        echo "<th>". $fiPartida['pPerdudes'] ."</th>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<td>". $_SESSION['partides']['guanyades']."</td>\n";
        echo "<td>". $_SESSION['partides']['perdudes'] ."</td>\n";
        echo "</tr>\n";
        echo "</table>\n";
        
        
    }

    function calculPuntuacio($fila,$encerts){
        $puntuacio = 0;
            if($fila == 1){
                $puntuacio = $encerts * 1 * 100;
            }else if($fila == 2){
                $puntuacio += $encerts * 0.8 * 100;
            }else if($fila == 3){
                $puntuacio += $encerts * 0.6 * 100;
            }else if($fila == 4){
                $puntuacio += $encerts * 0.4 * 100;
            }else if($fila == 5){
                $puntuacio += $encerts * 0.2 * 100;
            }else if($fila == 6){
                $puntuacio += $encerts * 0.1 * 100;
            }else if($fila == 6 && $encerts != 5){
                $puntuacio = 0;
            }
        return $puntuacio;
    }

    function mostrarPuntuacio(){
        $_SESSION['puntuacio'] = 0;
        for($p = 0; $p < count($_SESSION['totalPartides']); $p++){
            $puntuacio = 0;
            if($_SESSION['totalPartides'][$p]['modo'] == $_SESSION['modo']){
                $puntuacio += calculPuntuacioTemps($_SESSION['totalPartides'][$p]['temps']);
                foreach($_SESSION['totalPartides'][$p] as $intentos){
                    if($intentos != $_SESSION['totalPartides'][$p]['temps'] && $intentos != $_SESSION['totalPartides'][$p]['modo']){
                        $fila = ((int)$intentos[0])+1;
                        $encert = (int)$intentos[1];
                        $puntuacio += calculPuntuacio($fila,$encert);
                        if($fila == 6 && $encert != 5){
                            $puntuacio = 0;
                        }
                    }
                }
            }
            $_SESSION['puntuacio'] += $puntuacio; 
        }      
    }

    function paginaForbidden(){
        if( $_SESSION['idioma'] == 'ca' or (!isset( $_SESSION['idioma']))){
            include('./lang/lang_ca.php');
        }elseif( $_SESSION['idioma'] == 'es'){
            include('./lang/lang_es.php');
        }elseif( $_SESSION['idioma'] == 'en'){
            include('./lang/lang_en.php');
        }
        echo "<div id='forbidden'>
            <div>
                <p id='titol'>403 - Forbidden</p>
                <p id='subTitol'>". $forbidden['subtitol'] ."</p>
            </div>
    </div>\n</body>\n</html>";
    }


    function getRanking($nomArxiu){
        $liniesArxiu = file($nomArxiu);
        $paraules = [];
        foreach($liniesArxiu as $linia) {
            array_push($paraules, $linia);
        }
        return $paraules;
    }

    function ordenarRanking($rankingJugador, $itemSort){
        $keys = array_column($rankingJugador, $itemSort);
        array_multisort($keys, SORT_DESC, $rankingJugador);
        return $rankingJugador;
    }


    function actualitzarRanking(){
        $resumPartides = [0, 0, 0, 0, 0, 0];
        foreach($_SESSION['totalPartides'] as $partida){
            $intentsPartida = 0;
            if($partida['modo'] == $_SESSION['modo']){
                foreach($partida as $item){
                    if($item != $partida['modo'] && $item != $partida['temps']){
                        $intentsPartida += 1;
                    }
                }
                echo $intentsPartida;
                $resumPartides[$intentsPartida - 1] += 1;
            }
        }
        $strResumPartides = implode("-", $resumPartides);
        $_SESSION['resumPartidesIntents'] = $strResumPartides;
    }

    function afegirRanking(){
        $strEst = $_SESSION['nom_usuari'].",".$_SESSION['resumPartidesIntents'].",".$_SESSION['puntuacio'].",true";
        $file = 'record.txt';
        $actual = file_get_contents($file);
        $actual .= "$strEst\n";
        file_put_contents($file,$actual);
    }

    function deleteLastRecordUser($nomArxiu){
        $liniesArxiu = file($nomArxiu);
        $deleteLines = [];
        if(count($liniesArxiu) > 0){
            foreach($liniesArxiu as $linia) {
                $dades = explode(",", $linia);  //Separamos los datos
                if($dades[0] === $_SESSION['nom_usuari']){
                    array_push($deleteLines, $linia);
                }
            }
            foreach($deleteLines as $dLinies){
                $contents = file_get_contents($nomArxiu);
                $contents = str_replace($dLinies, '', $contents);
                file_put_contents($nomArxiu, $contents);
            }
        }
    }

    function ranking($ranking){
        $dictRank = [];
        foreach($ranking as $p){
            $dades = explode(",", $p);  //Separamos los datos
            
            //Jugador
            $jugador = $dades[0];

            //Puntuacio
            $puntuacio = $dades[2];

            //Estadisticas
            $estadistiques = [];
            
            if(trim(end($dades)) == 'true'){ //Jugador activo
                $intents = explode("-", $dades[1]); //Separamos las partidas x intentos;
                for($e = 0; $e < 6; $e++){
                    $intent = $intents[$e]; //Partidas con $e intentos
                    array_push($estadistiques, $intent);
                }

                array_push($dictRank,[
                    'nombre' => $jugador, 
                    'estadistiques' => $estadistiques,
                    'puntuacio' => $puntuacio
                ]);
            }
        }
        return ordenarRanking($dictRank, 'puntuacio');
    }
?>