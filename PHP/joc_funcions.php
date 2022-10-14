<?php
    function generarTaula($w,$h){
        echo "<table>\n";
        for($i = 0; $i < $h;$i++){
            echo "<tr>\n";
            for($j = 0; $j < $w;$j++){
                echo "<td id='$i$j'></td>\n";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function generarTeclat($w,$h){
        $lletres1 = "QWERTYUIOP";
        $lletres2 = "ASDFGHJKL7";
        $lletres3 = ["ENVIAR","Z","X","C","V","B","N","M","<--"];
        echo "<table>\n";
        for($i = 0; $i < $h;$i++){
            echo "<tr id = 'tr$i'>\n";
            if($i != $h-1){
                for($j = 0; $j < $w;$j++){
                    $id = "";
                    if($i == 0){
                        $id = $id = substr($lletres1,$j,1);
                        if($j == $w){
                            $id = "tdOcult";
                        }
                        echo "<td id = '$id'>".substr($lletres1,$j,1)."</td>\n";
                    }else{
                        $id = $id = substr($lletres2,$j,1);
                        if($j == $w){
                            $id = "tdOcult";
                        }
                        echo "<td id = '$id'>".substr($lletres2,$j,1)."</td>\n";
                    }
                    
                    
                    
                    
                }
            }else{
                for($j = 0; $j < $w-1;$j++){
                    $span = 0;
                    $id = $lletres3[$j];
                    if($j == $w-1){
                        $id = "tdOcult";
                    }
                    if($j == 0  || $id == "<--"){
                        $span = 2;
                    }
                    echo "<td colspan=$span id = '$id'>".$lletres3[$j]."</td>\n";
                }

            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>