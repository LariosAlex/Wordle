<?php
    session_start();
    include "funcions.php";
    
    $_SESSION['partides']['perdudes'] += 1;

    afegirPartida($_POST['estadistiques']);
    mostrarPuntuacio()
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
<nav>
    <a href="index.php">
        <div>
            HOME
        </div>
    </a>
    <a href="game.php">
        <div>
            JUGAR
        </div>
    </a>
    </nav>
    <div id="resultadoPartida">
        <h1><?php echo $fiPartida['titleLose'];?></h1>
    </div>
    <?php echo "<div id='nomUsuari'><strong>".$general['usuari'].$_SESSION['nom_usuari']."<br>". $fiPartida['punts'].$_SESSION['puntuacio'] ."</strong></div>\n<br>\n";
        echo "<div id='loseParaulaSecreta'><h2 id='paraulaSecreta'>".$fiPartida['fraseParaulaSecreta'].strtoupper($_SESSION['paraula']) ."</h2></div>";
    ?>

    <h3><?php echo $fiPartida['estadistica'];?></h3>
    <div id="estadistiques">
        <h4><?php echo $fiPartida['pGuanyades'];?></h4>
        <?php
            mostrarPartides();
        ?>
    </div>
</body>
</html>