<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr{
            align-self:center
        }
    </style>
</head>
<body>
    <table>
        <tr>
        <?php
            $lletres3 = ["ENVIAR","Z","X","C","V","B","N","M","<--","Q","W"];

            foreach($lletres3 as $lletra){
                echo "<td>$lletra</td>";
                if($lletra == "X" || $lletra == "B"){
                    echo "</tr><tr>";
                }
            }
        ?>
        </tr>
    </table>
</body>
</html>
