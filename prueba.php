<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <script>
        document.getElementById('prueba').value = "<?php $x = 2; ?>";
        var x = "x";
    </script>
    <input type="text" id ="prueba">
    <?php
        echo $x;
    ?>
    <form action="" onSubmit="return enviar()"></form>
</body>
</html>