<?php
    session_start();
    include('funcions.php');
    if($_SESSION['idioma'] == 'ca'){
        include('lang_ca.php');
    }elseif($_SESSION['idioma'] == 'es'){
        include('lang_es.php');
    }elseif($_SESSION['idioma'] == 'en'){
        include('lang_en.php');
    }
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Wordle</title>
    <script src="./JS/funcions.js"></script>
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorJavascript.php">
    </noscript>
</head>
<body id="game">
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
        <?php
            $paraula = $_POST['paraula'];
            $_SESSION['nom_usuari'] = $_POST['nom_usuari'];
        ?>
    <header>
        <?php echo "<div id='nomUsuari'><strong>".$index['nomUsuari'].$_SESSION['nom_usuari']."</strong></div>\n<br>\n"; 
        ?>
    </header>
    <article>
        <div>
            <h1 id="resultat"></h1>
        </div>
        <div>
        <?php
            generarTaula(5,6);
        ?>
        </div>
    </article>
    <br>
    <article>
    <?php
        generarTeclat();
    ?>
    </article>
    <?php
        echo "<p id='paraulaSecreta'>".$_SESSION['paraula'] ."</p>";
    ?>
</body>
</html>
