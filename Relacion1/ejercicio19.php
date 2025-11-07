<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
</head>

<body>
    <?php

    $numero = 360;
    $base = 8;
    $resultado = "";

    echo "El numero  original es $numero y la base a la que pasarlo $base";
    echo "<br> el resultado es: ";
    while ($numero >= $base) {
        $resultado = (string) $numero % $base . '-' . $resultado; //Casting eplicito
        //casting explicito de un numero entero en un dato tipo string
        $cociente = intval($numero / $base);
        $numero = $cociente;
    }

    echo (string)$numero . '-' . $resultado;

    ?>

</body>

</html>