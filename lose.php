<?php
    session_start();
    include "funcions.php";
    $_SESSION['partides']['perdudes'] += 1;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Wordle</title>
</head>
<body>
    <h1>HAS PERDUT!!</h1>
    <?php
        $paraulaOculta = $_SESSION['paraula'];
        echo "<p>La paraula oculta es: <strong>$paraulaOculta</strong></p>";
    ?>
    <h3>Estadistiques:</h3>
    <div id="estadistiques">
        <?php
            echo "<p>La teva puntuacio es: <strong>".generarPuntuacio($_POST['estadistiques'])[1]."</strong></p>";
        ?>
        <h4>Partides guanyades:</h4>
        <?php
            
            estadistiques($_SESSION['partides']);
        ?>
    </div>
</body>
</html>