<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
    <style>
        .divisor {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    $num = 10;

    if ($num < 1) {
        echo "No puede tener divisores si es 0 o negativo";
    } else {
        echo "Los divisores de $num son: ";
        // Recorremos desde 1 hasta $num
        for ($i = 1; $i <= $num; $i++) {
            // Comprobamos si el resto de la división es 0
            if ($num % $i == 0) {
                // Si es divisor, aplicamos la clase CSS
                echo "<span class='divisor'>$i</span> ";
            }
        }
    }
    ?>
</body>

</html>