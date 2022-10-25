<?php
    session_start();
    include "funcions.php";
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Wordle</title>
</head>
<body>
    <h1>HAS GUANYAT!!</h1>
    <h3>Estadistiques:</h3>
    <div id="estadistiques">
        <?php
            echo "<p>La teva puntuacio es: <strong>".generarPuntuacio($_POST['estadistiques'])[1]."</strong></p>";
        ?>
        <h4>Partides guanyades:</h4>
        <?php        
        array_push($_SESSION['partides']['guanyades'],generarPuntuacio($_POST['estadistiques']));

        estadistiques($_SESSION['partides']);

        /*
            function afegirPartida($resumPartida){
                $arrayPartida = explode(",",$resumPartida);
                $partidaActual = [];
                //echo var_dump($arrayPartida);
                foreach($arrayPartida as $FilaIntents){
                    $arrayResumIntents = explode("-",$FilaIntents);
                    array_push($partidaActual,$arrayResumIntents);
                }

                array_push($_SESSION['totalPartides'],$partidaActual);
            }

            function mostrarPartides(){
                for($p = 0; $p < count($_SESSION['totalPartides']); $p++){
                    echo "Partida $p <br>";
                    foreach($_SESSION['totalPartides'][$p] as $intentos){
                        $fila = ((int)$intentos[0])+1;
                        $encert = (int)$intentos[1];
                        
                        echo calculPuntuacio($fila,$encert,1)."<br>";
                    }
                }
            }

            function calculPuntuacio($fila,$encerts,$multiplicador){
                $puntuacio = 0;
                    if($fila == 1){
                        $puntuacio = $encerts * 1 * 100;
                    }else if($fila == 2){
                        $puntuacio += $encerts * 0.8 * 50;
                    }
                return $puntuacio;
            }
            
            //afegirPartida($_POST['estadistiques']);
            //mostrarPartides();
            
        */
        ?>

    </div>
</body>
</html>