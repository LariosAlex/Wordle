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
    <link rel="stylesheet" href="../CSS/inici_estil.css">
    <title>Wordle</title>
</head>
<body>
    <main>
        <h1>Benvingut al Wordle!</h1>
        <img src="../SRC/imatgeWordle.png" alt="">
        
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
