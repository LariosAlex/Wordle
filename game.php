<?php
    session_start();
    include('funcions.php');

    //Idioma al que estem jugant
    if($_SESSION['idioma'] == 'ca'){
        $_SESSION['paraula'] = obtenirParaula('./lang/catala_5.txt');
    }elseif($_SESSION['idioma'] == 'es'){
        $_SESSION['paraula'] = obtenirParaula('./lang/castellano_5.txt');
    }elseif($_SESSION['idioma'] == 'en'){
        $_SESSION['paraula'] = obtenirParaula('./lang/english_5.txt');
    }

    //Comprova el mode al que estem
    if(isset($_POST['botoChrono'])){
        $_SESSION['modo'] = 'crono';
    }
    if(isset($_POST['botoJugar'])){
        $_SESSION['modo'] = 'normal';
    }

    //Mostrar posicio 1 del ranking
    $rankingTXT = getRanking('record.txt');
    $ranking = ranking($rankingTXT);
    $usuariHallFame = $ranking[0]['nombre'];
    $puntuacioHallFame = $ranking[0]['puntuacio'];

    $_SESSION['boolean'] = TRUE;

    if(isset($_POST['theme'])){
        $_SESSION['theme'] = $_POST['theme'];
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
<?php
    if($_SESSION['modo'] == 'crono'){
        echo "<body id='body' class='body_game chrono' onload='iniciChrono()'>";
    }else{
        echo "<body id='body' class='body_game' onload='inici()'>";
    }
?>
<nav>
        <form action="index.php" method="post" id="formNom" name="formInici">
                <input class="disNone" type="text" name="theme" value="" id="colorDeTema">
            </form>
        <a onclick="cambiarPantallaSubmit()">
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
                if($_POST['nom_usuari'] != $_SESSION['nom_usuari']){
                    $_SESSION['partides'] = ["perdudes" => 0,"guanyades" => 0];
                    $_SESSION['totalPartides'] = [];
                    $_SESSION['puntuacio'] = 0;
                }
                $_SESSION['nom_usuari'] = $_POST['nom_usuari'];
            }
        ?>
    <header>
        <?php echo "<div id='nomUsuariHall'><strong>Hall of Fame: ".$usuariHallFame."</strong></div>\n<br>\n";?>
        <?php echo "<div id='nomUsuari'><strong>".$general['usuari'].$_SESSION['nom_usuari'].' - '.$fiPartida['punts'].$_SESSION['puntuacio']."</strong></div>\n<br>\n";?>
    </header>
    <article>
        <div id="contenedor">
            <div class="reloj" id="Hores">00</div>
            <?php
                if($_SESSION['modo'] == 'crono'){
                    echo "<div class='reloj' id='Minuts'>:02</div>";
                }else{
                    echo "<div class='reloj' id='Minuts'>:00</div>";
                }
            ?>
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
        echo "<p id='colorAnterior' class='disNone'>".$_SESSION['theme']."</p>"
    ?>
    <script src="./JS/funcions.js"></script>
</body>
</html>
