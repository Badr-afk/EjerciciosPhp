<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <h2>Mostrar Valores</h2>
    <?php
        $edad=21;
        $nombre="Badr"  ;
        $altura=1.89;
        $boolean=true;

        printf("Mi nombre es %s y tengo %d años, mido %f y soy español %s <br>",$nombre,$edad,$altura,$boolean);
        var_dump($nombre,$edad,$altura,$boolean)
    ?>
</body>
</html>