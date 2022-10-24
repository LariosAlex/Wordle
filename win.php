<?php
    session_start();
    include "funcions.php";
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
    <h1>HAS GUANYAT!!</h1>
    <h3>Estadistiques:</h3>
    <div id="estadistiques">
        <h4>Partides guanyades:</h4>
        <?php
            array_push($_SESSION['partides']['guanyades'],$_POST['fila']+1);
            estadistiques($_SESSION['partides']);
        ?>

    </div>
</body>
</html>