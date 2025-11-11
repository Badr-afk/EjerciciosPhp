<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
</head>

<body>
    <?php
    $dividendo = 20;
    $divisor = 6;
    $cociente = 0;



    while ($dividendo >= $divisor) {
        $dividendo -= $divisor;
        $cociente++;
    }
    echo "El cociente es: $cociente y el resto es: $dividendo";
    ?>
</body>

</html>