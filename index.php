<?php
    session_start();
    //Sel·lecco de idioma
    if(!isset($_SESSION['idioma'])){
        $_SESSION['idioma'] = 'ca';
    }elseif(isset($_POST['idioma'])){
        $_SESSION['idioma'] = $_POST['idioma'];
    }
    if(isset($_POST['theme'])){
        $_SESSION['theme'] = $_POST['theme'];
    }
    //Importar funcions
    include('funcions.php');

    //Declarar Sessions
    $_SESSION['partides'] = ["perdudes" => 0,"guanyades" => 0];
    $_SESSION['totalPartides'] = [];
    $_SESSION['puntuacio'] = 0;
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
<body id="body" class="body_index" name="body" onload="compararColor()">
    <main>
        <?php echo "<h1>".$index['salutacio']."</h1>"; ?>
        <img id="imatgeWordle" src="./SRC/imatgeWordle.png" alt="imagen del icono de la pagina web (Worddle)">
        <div id="divLlenguatge">
            <p>Escull idioma / Escoge idioma / Choose language:</p>
            <form action="index.php" method="post" id="formIdioma">
                <label id="labelCa" class="labelIdioma">
                    <input type="radio" id="ca" name="idioma" value="ca" onchange="this.form.submit()" checked class="inputIdioma">
                    <img src="./SRC/ca.png" alt="Bandera catalana" class="bandera">
                    <p>Ca</p>
                </label><br>
                <label id="labelEs" class="labelIdioma">
                    <input type="radio" id="es" name="idioma" value="es" onclick="this.form.submit()" class="inputIdioma"
                    <?php if($_SESSION['idioma'] == 'es'){
                        echo " checked";
                    }?>
                    >
                    <img src="./SRC/es.png" alt="Bandera española" class="bandera">
                    <p>Es</p>    
                </label><br>
                <label id="labelEn" class="labelIdioma">
                    <input type="radio" id="en" name="idioma" value="en" onclick="this.form.submit()"  class="inputIdioma"
                    <?php if($_SESSION['idioma'] == 'en'){
                        echo " checked";
                    }?>
                    >
                    <img src="./SRC/en.png" alt="English flag" class="bandera">
                    <p>En</p>     
                </label>
            </form>
        </div>
        <div id="divNom">
            <form action="game.php" method="post" id="formNom" name="formInici">
                <input type="text" name="nom_usuari" id="nom_usuari" placeholder="<?php echo $general['usuari']; ?>" value="<?php echo $_SESSION['nom_usuari']; ?>" required>
                <input class="disNone" type="text" name="theme" value="" id="colorDeTema">
                <input name="botoJugar" onclick="cambiarPantallaSubmit()" value="<?php echo $index['botoJugar']; ?>" id="butoJugar">
            </form>
        </div>
        <div id="instruccions">
        <?php 
            echo "<h1>".$index['title']."</h1>";
            echo "<p>".$index['punt1']."<p>";
            echo "<p>".$index['punt2']."<p>";
            echo "<p>".$index['punt3']."<p>";
        ?> 
        <ul>
        <?php 
            echo "<li>".$index['itemList1']."</li>";
            echo "<li>".$index['itemList2']."</li>";
            echo "<li>".$index['itemList3']."</li>";
        ?> 
        </ul>
        </div>
    </main>
    <form action="index.php" method="post" id="formNom" name="formInici2">
        <input class="disNone" type="text" name="theme" value="" id="colorDeTema2">
        <input name="botoJugar" onclick="canviarMode()" value="Canviar Mode" id="botoCanviarMode">
    </form>
    <?php 
        if(isset($_SESSION['theme'])){
            echo "<p id='colorAnterior' class='disNone'>".$_SESSION['theme']."</p>";
        }
    ?>
    <footer>
        <p>Ies Esteve Terradas</p>
    </footer>
</body>
</html>
