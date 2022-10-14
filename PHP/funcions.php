
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
            return $paraules[numeroRandom(0, count($paraules) - 1)];
        }
        function numeroRandom($min, $max){
            return rand($min, $max);
        }
    ?>
