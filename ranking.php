<?php
    session_start();
    //Importar funcions
    include('funcions.php');
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
            <th>INTENTS</th>
            <th>PUNTUACIÓ</th>
        </tr>

        <?php 
            $rankingTXT = getRanking('record.txt');
            $ranking = ranking($rankingTXT);
            foreach($ranking as $record){
                echo '<tr>';
                echo '<td>'.$record['nombre'].'</td>';
                echo '<td> </td>';
                echo '<td>'.$record['puntuacio'].'</td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>