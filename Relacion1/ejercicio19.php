<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
</head>
<body>
    <?php

$numeroDecimal = 25;

// Validar que sea un número natural (entero no negativo)
if (is_numeric($numeroDecimal) && $numeroDecimal >= 0 && floor($numeroDecimal) == $numeroDecimal) {
    // Convertir a binario usando la función decbin()
    $numeroBinario = decbin($numeroDecimal);

    echo "El número decimal $numeroDecimal en binario es: $numeroBinario";
} else {
    echo "Por favor, ingresa un número natural (entero no negativo).";
}
?>

</body>
</html>