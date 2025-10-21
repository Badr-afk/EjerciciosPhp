<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números primos</title>
</head>
<body>
    <?php
    function esPrimo($num) {
        if ($num < 2) return false; // 0 y 1 no son primos
        for ($i = 2; $i <= sqrt($num); $i++) { // solo hasta la raíz cuadrada
            if ($num % $i == 0) {
                return false;
            }
        }
        return true; // si no se encontró divisor, es primo
    }

    if (isset($_GET["numero"])) {
        $numero = intval($_GET["numero"]);

        echo "<h2>Números primos hasta $numero:</h2>";
        for ($j = 2; $j <= $numero; $j++) {
            if (esPrimo($j)) {
                echo $j . " ";
            }
        }
    }
    ?>
</body>
</html>
