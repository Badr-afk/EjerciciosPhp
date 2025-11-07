<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_GET['primos'])) {
        $num = $_GET['num'];
        $contador = 2;
        $comprobador = true;

        if ($num > 1) {
            do {
                if ($num % $contador == 0) {
                    $comprobador = false;
                }
                $contador++;
            } while ($comprobador && $contador < $num);
        } else {
            $comprobador = false;
        }

        if ($comprobador) {
            echo "<p class='font-monospace badge text-bg-primary text-wrap'>";
            echo "El número $num es primo";
            echo "</p>";
        } else {
            echo "<p class='font-monospace badge text-bg-primary text-wrap'>";
            echo "El número $num NO es primo (tiene al menos el divisor " . ($contador - 1) . ")";
            echo "</p>";
        }
    } else  if (isset($_GET['divisores'])) {
        $num = $_GET['num'];

        if ($num < 1) {
            echo "<p class='font-monospace badge text-bg-primary text-wrap'>";
            echo "No puede tener divisores si es 0 o negativo";
            echo "</p>";
        } else {
            echo "<p class='font-monospace badge text-bg-primary text-wrap'>";
            echo "Los divisores de $num son: ";
            echo "</p>";
            // Recorremos desde 1 hasta $num
            for ($i = 1; $i <= $num; $i++) {
                // Comprobamos si el resto de la división es 0
                if ($num % $i == 0) {
                    // Si es divisor, aplicamos la clase CSS
                    echo "<p class='font-monospace badge text-bg-primary text-wrap'>";
                    echo "<span class='divisor'>$i</span> ";
                    echo "</p>";
                }
            }
        }
    }
    ?>
</body>

</html>