<?php
    session_start();
    //Importar funcions
    include('funcions.php');
    $rankingTXT = getRanking('record.txt');
    $ranking = ranking($rankingTXT);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Wordle</title>
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorJavascript.php">
    </noscript>
    <script src="./JS/funcions.js"></script>
</head>
<body id="ranking">
    <h1><img src="./SRC/trofeo.png" alt="trofeo" id="imgTrofeo">HALL OF FAME<img src="./SRC/trofeo.png" alt="trofeo" id="imgTrofeo"></h1>
    <nav>
        <a href="index.php">
            <div>
                <?php echo $general['boto2'];?> 
            </div>
        </a>
    </nav>
    <table id='rankingTable'>
        <tr>
            <th>NOM</th>
            <th>PARTIDES</th>
            <th>PUNTUACIÓ</th>
            <th>INFO</th>
        </tr>

        <?php 
            for($r = 0; $r < count($ranking); $r++){
                echo '<tr>';
                $bground = '';
                if($r == 0){
                    $bground = 'gold';
                }else if ($r == 1){
                    $bground = '#C0C0C0';
                }else if($r == 2){
                    $bground = '#CD7F32';
                }
                echo '<td bgcolor = '.$bground.'>'.$ranking[$r]['nombre'].'</td>';
                $totalPartides = 0;
                foreach($ranking[$r]['estadistiques'] as $partida){
                    $totalPartides += $partida;
                }
                echo '<td bgcolor = '.$bground.'>'.$totalPartides.'</td>';
                echo '<td bgcolor = '.$bground.'>'.$ranking[$r]['puntuacio'].'</td>';
                echo '<td bgcolor = '.$bground.'><a href="../ranking.php?usuariDetalls='.$ranking[$r]['nombre'].'"><img src="./SRC/informacion.png" alt="info" id="iconInfo"></a></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <?php
    if(isset($_GET['usuariDetalls'])){
    ?>
        <table id='rankingTableDetalls'>
            <tr>
                <th>INTENTS</th>
                <th>PARTIDES</th>
            </tr>
            <?php 
                foreach($ranking as $detallsRanking){
                        if($detallsRanking['nombre'] == $_GET['usuariDetalls']){
                            echo '<caption>'.$detallsRanking['nombre'].'</caption>';
                            for($d = 0; $d < count($detallsRanking['estadistiques']); $d++){
                                echo '<tr>';
                                    echo '<td>'.($d+1).'</td>';
                                    echo '<td>'.$detallsRanking['estadistiques'][$d].'</td>';
                                echo '</tr>';
                            }
                        };
                }
            ?>
        </table>
    <?php
    }
    ?>
</body>
</html>