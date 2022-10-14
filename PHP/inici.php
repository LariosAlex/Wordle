<?php
include('funcions.php');
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/inici_style.css">
    <title>Wordle</title>
</head>
<body>
    <main>
        <h1>Benvingut al Wordle!</h1>
        <img src="../SRC/imatgeWordle.png" alt="">
        <?php
        if(isset($_POST['botoJugar'])){
            ///Palabra random del diccionario guardada
            $_POST['paraula'] = obtenirParaula('cat5.txt');
        };
        ?>
        <form action="joc.php" method="post">
            <input type="text" name="nom_usuari" required>
            <input type="submit" name="botoJugar" value="Jugar">
        </form>
        <p>Instruccions </p>
    </main>
    <footer>
        <p>Ies Esteve Terradas</p>
    </footer>
</body>
</html>