<?php
    session_start();
    include('funcions.php');
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
</head>
<body id="game">
    <h1></h1>
        <?php
            $paraula = $_POST['paraula'];
            $_SESSION['nom_usuari'] = $_POST['nom_usuari'];
            $_SESSION['idioma'] = $_POST['idioma'];
        ?>
    <header>
        <?php echo "<div id='nomUsuari'><strong>Usuari:".$_SESSION['idioma']."</strong></div>\n<br>\n"; 
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
        $_POST['paraula'] = obtenirParaula('cat5.txt');
        echo "<p id='paraulaSecreta'>".$_POST['paraula'] ."</p>";
    ?>
</body>
</html>
