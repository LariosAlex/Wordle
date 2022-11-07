<?php
    session_start();
    include('funcions.php');

    if( $_SESSION['idioma'] == 'ca' or (!isset( $_SESSION['idioma']))){
        include('lang_ca.php');
    }elseif( $_SESSION['idioma'] == 'es'){
        include('lang_es.php');
    }elseif( $_SESSION['idioma'] == 'en'){
        include('lang_en.php');
    }

    if($_SESSION['idioma'] == 'ca'){
        $_SESSION['paraula'] = obtenirParaula('catala_5.txt');
    }elseif($_SESSION['idioma'] == 'es'){
        $_SESSION['paraula'] = obtenirParaula('castellano_5.txt');
    }elseif($_SESSION['idioma'] == 'en'){
        $_SESSION['paraula'] = obtenirParaula('english_5.txt');
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
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorJavascript.php">
    </noscript>
</head>
<body id="game" onload="inici()">
<nav>
        <a href="index.php">
            <div>
                <?php echo $general['boto2'];?> 
            </div>
        </a>
        <a href="game.php">
            <div>
                <?php echo $general['boto1'];?> 
            </div>
        </a>
    </nav>
        <?php
            if(isset($_POST['nom_usuari'])){
                $_SESSION['nom_usuari'] = $_POST['nom_usuari'];
            }
        ?>
    <header>
        <?php echo "<div id='nomUsuari'><strong>".$general['usuari'].$_SESSION['nom_usuari']."<br>". $fiPartida['punts'].$_SESSION['puntuacio'] ."</strong></div>\n<br>\n";
        ?>
    </header>
    <article>
        <div id="contenedor">
            <div class="reloj" id="Hores">00</div>
            <div class="reloj" id="Minuts">:00</div>
            <div class="reloj" id="Segons">:00</div>
        </div>
        <div>
        <?php
            generarTaula(5,6);
        ?>
        </div>
    </article>
    <article>
    <?php
        generarTeclat();
    ?>
    </article>
    <?php
        echo "<p id='paraulaSecreta'>".$_SESSION['paraula']."</p>";
    ?>
        <script src="./JS/funcions.js"></script>
</body>
</html>
