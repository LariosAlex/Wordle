<?php
    session_start();
    include('funcions.php');
    if($_POST['idioma'] == 'ca'){
        include('lang_ca.php');
    }elseif($_POST['idioma'] == 'es'){
        include('lang_es.php');
    }elseif($_POST['idioma'] == 'en'){
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
</head>
<body id="index">
    <?php
        if(!isset($_POST['idioma'])){
            $_SESSION['idioma'] = 'ca';
        }else{
            $_SESSION['idioma'] = $_POST['idioma'];
        }
    ?>
    <main>
        <?php echo "<h1>".$index['salutacio']."</h1>"; ?>
        <img src="./SRC/imatgeWordle.png" alt="">
        <div id="divLlenguatge">
            <p>Escull idioma / Escoge idioma / Choose language:</p>
            <form action="index.php" method="post" id="formIdioma">
                <label>
                    <input type="radio" id="ca" name="idioma" value="ca" onchange="this.form.submit()" checked>
                    <img src="./SRC/ca.png" alt="Bandera catalana">
                        Català
                </label><br>
                <label>
                    <input type="radio" id="es" name="idioma" value="es" onclick="this.form.submit()"
                    <?php if($_SESSION['idioma'] == 'es'){
                        echo " checked";
                    }?>
                    >
                    <img src="./SRC/es.png" alt="Bandera española" width="60">
                        Español
                </label><br>
                <label>
                    <input type="radio" id="en" name="idioma" value="en" onclick="this.form.submit()" 
                    <?php if($_SESSION['idioma'] == 'en'){
                        echo " checked";
                    }?>
                    >
                    <img src="./SRC/en.png" alt="English flag">
                        English 
                </label>
            </form>
        </div>
        <div id="divNom">
            <form action="game.php" method="post" id="formNom">
                <input type="text" name="nom_usuari" required id="nom_usuari">
                <input type="submit" name="botoJugar" value="<?php echo $index['botoJugar']; ?>" id="butoJugar">
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
            echo "<li>".$index['punt1']."</li>";
            echo "<li>".$index['punt2']."</li>";
            echo "<li>".$index['punt3']."</li>";
        ?> 
        </ul>
        </div>
    </main>
    <footer>
        <p>Ies Esteve Terradas</p>
    </footer>
</body>
</html>
