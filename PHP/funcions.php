<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="submit" name="botoJugar" value="Proba"/>
    </form>
    <?php
        if(isset($_POST['botoJugar'])){
            obtenirParaula('cat5.txt');
        };
        function obtenirParaula($nomArxiu){
            $liniesArxiu = file($nomArxiu);
            $paraules = [];
            foreach($liniesArxiu as $paraula) {
                array_push($paraules, $paraula);
            }
            echo $paraules[numeroRandom(0, count($paraules) - 1)];
        }
        function numeroRandom($min, $max){
            return rand($min, $max);
        }
    ?>
</body>
</html>