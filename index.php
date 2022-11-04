<?php
    session_start();
    //Sel·lecco de idioma
    if(!isset($_SESSION['idioma'])){
        $_SESSION['idioma'] = 'ca';
    }elseif(isset($_POST['idioma'])){
        $_SESSION['idioma'] = $_POST['idioma'];
    } 

    //Importar funcions
    include('funcions.php');

    //Declarar Sessions si no estan declaradas
    if(!isset($_SESSION['partides'])){
        $_SESSION['partides'] = ["perdudes" => 0,"guanyades" => 0];
    }
    if(!isset($_SESSION['totalPartides'])){
        $_SESSION['totalPartides'] = [];
    }
    if(!isset($_SESSION['puntuacio'])){
        $_SESSION['puntuacio'] = 0;
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
    <script src="./JS/funcions.js"></script>
</head>
<body id="index">
    <?php 
    if(isset($_POST["reset"])){
        session_destroy();
        header("location:index.php");
    }
    ?>
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
            <form action="game.php" method="post" id="formNom">
                <input type="text" name="nom_usuari" id="nom_usuari" placeholder="<?php echo $general['usuari']; ?>" value="<?php echo $_SESSION['nom_usuari']; ?>" required>
                <input type="submit" name="botoJugar" value="<?php echo $index['botoJugar']; ?>" id="butoJugar">
            </form>
            <div id="botons">
                    <button id="resetBtn" onclick="canviarVisibilitatPopup()">Resetear Sesion Actual</button>
                    <button id="rankingBtn">Mostrar Ranking</button>
            </div>
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
    <div id="popupReset">
        <h2>Deseas resetear la sesion actual?</h2>
        <div>
            <form method="post">
            <input type="submit" name="reset" value="Si">
            </form>
            <button onclick="canviarVisibilitatPopup()">No</button>
        </div>     
    </div>
    <footer>
        <p>Ies Esteve Terradas</p>
    </footer>
</body>
</html>
