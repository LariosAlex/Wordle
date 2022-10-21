<?php
    session_start();
    //key($_SESSION['partides']['guanyades'][0]) += 1; 
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
        echo $_POST['paraula'];
        foreach($_SESSION['partides']['guanyades'] as $partida => $intent){
            echo "<p>A la partida $partida has guanyat amb $intent intent/os</p>";
        }
        ?>
        <h4>Nº de partides perdudes perdudes: <?php echo $_SESSION['partides']['perdudes'];?></h4>
        
    </div>
</body>
</html>