<?php
    if( $_SESSION['idioma'] == 'ca' or (!isset( $_SESSION['idioma']))){
        include('lang_ca.php');
    }else if( $_SESSION['idioma'] == 'es'){
        include('lang_es.php');
    }else if( $_SESSION['idioma'] == 'en'){
        include('lang_en.php');
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
                echo "<form id='formGame' method='post'>\n";
                echo "<input type='text' id='inputGame' hidden>\n";
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
        array_push($_SESSION['totalPartides'],$partidaActual);
        
    }

    function mostrarPartides(){
        if( $_SESSION['idioma'] == 'ca' or (!isset( $_SESSION['idioma']))){
            include('lang_ca.php');
        }elseif( $_SESSION['idioma'] == 'es'){
            include('lang_es.php');
        }elseif( $_SESSION['idioma'] == 'en'){
            include('lang_en.php');
        }
        echo "<table id='estadistiquesGenerals'>\n<tr>\n
        <th>". $fiPartida['partida'] ."</th>\n
        <th>". $fiPartida['intents'] ."</th>\n
        <th>". $fiPartida['punts'] ."</th>\n
        </tr>\n";
        for($p = 0; $p < count($_SESSION['totalPartides']); $p++){
            echo "<tr>\n";
            $puntuacio = 0;
            foreach($_SESSION['totalPartides'][$p] as $intentos){
                $fila = ((int)$intentos[0])+1;
                $encert = (int)$intentos[1];
                $puntuacio += calculPuntuacio($fila,$encert);
            }
            echo "<td>".($p+1)."</td>\n";
            echo "<td>$fila</td>\n";
            echo "<td>$puntuacio</td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";

        echo "<br>\n<table id='resultatPartides'>\n";
        echo "<tr>\n";
        echo "<th>". $fiPartida['pGuanyades'] ."</th>\n";
        echo "<th>". $fiPartida['pPerdudes'] ."</th>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<td>". $_SESSION['partides']['guanyades'] ."</td>\n";
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
        for($p = 0; $p < count($_SESSION['totalPartides']); $p++){
            $puntuacio = 0;
            foreach($_SESSION['totalPartides'][$p] as $intentos){
                $fila = ((int)$intentos[0])+1;
                $encert = (int)$intentos[1];
                $puntuacio += calculPuntuacio($fila,$encert);
            }
        }
        $_SESSION['puntuacio'] += $puntuacio;
        
    }
?>