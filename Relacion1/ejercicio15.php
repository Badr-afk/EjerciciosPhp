<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
</head>

<body>
    <h2>Mostrar los números primos</h2>
    <?php
    $num = 13;
    $contador = 2;
    $comprobador = true;

    // Solo entramos al bucle si el número es mayor que 2 para evitar errores con el 1 o 2.
    // Aunque para este ejemplo sencillo con 13 funciona directo.
    if ($num > 1) {
        do {
            // CORRECCIÓN 1: Usamos $contador en lugar de $i
            if ($num % $contador == 0) {
                $comprobador = false;
                // Opcional: break; para salir inmediatamente si encuentras uno.
            }
            $contador++;
            // CORRECCIÓN 2: Usamos && (AND) y < (menor que)
            // Repetir MIENTRAS siga pareciendo primo Y el contador sea menor que el número
        } while ($comprobador && $contador < $num);
    } else {
        // El 1 o menores no son primos
        $comprobador = false;
    }

    if ($comprobador) {
        echo "El número $num es primo";
    } else {
        // Restamos 1 al contador porque se incrementó justo antes de salir del bucle
        echo "El número $num NO es primo (tiene al menos el divisor " . ($contador - 1) . ")";
    }
    ?>
</body>

</html>