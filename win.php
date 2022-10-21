<?php
    session_start();
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
    <?php echo "<div id='nomUsuari'><strong>Usuari:".$_SESSION['nom_usuari']."</strong></div>\n<br>\n";?>
</body>
</html>