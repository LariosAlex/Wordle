<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/joc_style.css">
    <title>Wordle</title>
</head>
<body>
    
    <?php
        include "joc_funcions.php";
        //$_POST['nom_usuari']
        $nomUsuari = "Pau Rius";

        echo "<div id='nomUsuari'><strong>$nomUsuari</strong></div>\n<br>\n";
        generarTaula(5,6);
        echo "\n<br>\n";
        generarTeclat(10,3);
    ?>
</body>
</html>