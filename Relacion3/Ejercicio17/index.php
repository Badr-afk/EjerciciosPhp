<?php

// ----------------------------------------------------
// 1. Inicialización de Arrays (Usando range y funciones del ejercicio anterior)
// ----------------------------------------------------

// Array de IMPARES entre 1 y 20
// Usamos range para generar de 1 a 20.
// Usamos array_filter con una función anónima (o arrow fn en PHP 7.4+) para filtrar solo impares (resto 1 al dividir por 2).
$impares = array_filter(range(1, 20), fn($n) => $n % 2 !== 0);
// Resultado: [1, 3, 5, 7, 9, 11, 13, 15, 17, 19]

// Array de MÚLTIPLOS DE 3 entre 1 y 40
// Usamos range para generar de 1 a 40.
// Usamos array_filter para filtrar solo múltiplos de 3 (resto 0 al dividir por 3).
$multiplosDeTres = array_filter(range(1, 40), fn($n) => $n % 3 === 0);
// Resultado: [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36, 39]


// ----------------------------------------------------
// 2. Aplicación de Funciones de Array
// ----------------------------------------------------

$resultados = [];
$resultados[] = "<h3>Arrays Iniciales</h3>";
$resultados[] = "<p><strong>\$impares:</strong> " . implode(', ', $impares) . "</p>";
$resultados[] = "<p><strong>\$multiplosDeTres:</strong> " . implode(', ', $multiplosDeTres) . "</p><hr>";


// --- 2.1. array_count: Contar cuántos pares tienen ---
// Equivalente Nativo: count() (si queremos contar el total) o array_filter + count (si queremos contar los pares)
$paresEnImpares = count(array_filter($impares, fn($n) => $n % 2 === 0)); // Debería ser 0
$paresEnMultiplos = count(array_filter($multiplosDeTres, fn($n) => $n % 2 === 0));

$resultados[] = "<h3>1. Conteo (array_count / count + array_filter)</h3>";
$resultados[] = "<p>En **\$impares**, la cantidad de números pares es: **{$paresEnImpares}**.</p>";
$resultados[] = "<p>En **\$multiplosDeTres**, la cantidad de números pares es: **{$paresEnMultiplos}**.</p><hr>";


// --- 2.2. array_any: Comprobar si hay algún múltiplo de 5 ---
// Equivalente Nativo: array_filter (para encontrar coincidencias) + count > 0, o in_array si el valor es exacto.
$hayMultiplosDeCinco = count(array_filter($impares, fn($n) => $n % 5 === 0)) > 0;

$resultados[] = "<h3>2. Validación (array_any / count + array_filter)</h3>";
$resultados[] = "<p>¿Hay algún múltiplo de 5 en **\$impares**? " . ($hayMultiplosDeCinco ? '**SÍ**' : ' **NO**') . " (El booleano devuelto es: **" . ($hayMultiplosDeCinco ? 'true' : 'false') . "**)</p><hr>";


// --- 2.3. array_filter: Extraer los que sean primos ---
// Función auxiliar para determinar si un número es primo
$esPrimo = function ($n) {
    if ($n <= 1) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i === 0) return false;
    }
    return true;
};
$primos = array_filter($impares, $esPrimo);

$resultados[] = "<h3>3. Filtrado (array_filter)</h3>";
$resultados[] = "<p>Números **primos** extraídos de \$impares: " . implode(', ', $primos) . "</p><hr>";


// --- 2.4. array_find: Primera ocurrencia de número de dos cifras idénticas ---
// Equivalente Nativo: array_filter + array_values + primera posición [0]
$dobleCifraIdentica = array_filter($multiplosDeTres, function($n) {
    if ($n >= 10 && $n <= 99) {
        $s = (string)$n;
        return $s[0] === $s[1]; // Compara la primera y segunda cifra
    }
    return false;
});

$primeraOcurrencia = array_values($dobleCifraIdentica)[0] ?? 'N/A';
// El número de dos cifras idénticas es 33 (está en $multiplosDeTres)

$resultados[] = "<h3>4. Búsqueda (array_find / array_filter + array_values)</h3>";
$resultados[] = "<p>Primera ocurrencia de número de dos cifras idénticas en \$multiplosDeTres: **{$primeraOcurrencia}**.</p><hr>";


// --- 2.5. array_map: Obtener el cuadrado de cada valor ---
$cuadrados = array_map(fn($n) => $n ** 2, $multiplosDeTres);

$resultados[] = "<h3>5. Mapeo (array_map)</h3>";
$resultados[] = "<p>Cuadrados de **\$multiplosDeTres**: " . implode(', ', $cuadrados) . "</p><hr>";


// --- 2.6. array_walk: Sustituir cada valor por su doble ---
// Nota: array_walk modifica el array original pasándolo por referencia (&)
$dobles = $impares; // Creamos una copia para no modificar el original de futuros cálculos
array_walk($dobles, function(&$valor) {
    $valor *= 2;
});

$resultados[] = "<h3>6. Recorrido con Modificación (array_walk)</h3>";
$resultados[] = "<p>Array **\$impares** después de aplicar **array_walk** para doblar sus valores: " . implode(', ', $dobles) . "</p><hr>";


// --- 2.7. array_intersect: Valores que están en ambos arrays ---
$interseccion = array_intersect($impares, $multiplosDeTres);

$resultados[] = "<h3>7. Intersección (array_intersect)</h3>";
$resultados[] = "<p>Valores comunes entre **\$impares** y **\$multiplosDeTres**: " . implode(', ', $interseccion) . "</p>";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio de Funciones de Array en PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4 text-primary">Funciones de Arrays en PHP (Ejercicio 17)</h1>
        <div class="card shadow-sm p-4">
            <?php
            foreach ($resultados as $html) {
                echo $html;
            }
            ?>
        </div>
    </div>
</body>
</html>