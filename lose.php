<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ca">
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
<body onload="executarSo('../SRC/soPerdida.mp3')">
    <div id="resultadoPartida">
        <h1>HAS PERDUT!!</h1>
    </div>
    <?php echo "<div id='nomUsuari'><strong>Usuari:".$_SESSION['nom_usuari']."</strong></div>\n<br>\n";
          echo "<div id='loseParaulaSecreta'><h2 id='paraulaSecreta'> La paraula secreta era: ".$_SESSION['paraula'] ."</h2></div>";?>

</body>
</html>