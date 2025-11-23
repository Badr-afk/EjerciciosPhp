<?php

// ----------------------------------------------------
// 1. Inicialización y Funciones Auxiliares
// ----------------------------------------------------

// Inicializar la variable de resultados HTML
$resultados_html = '';

// Array de números del 1 al 100 (usando range)
$numeros = range(1, 100);

// Función auxiliar para determinar si un número es primo (usada en array_filter)
$esPrimo = function ($n) {
    if ($n <= 1) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i === 0) return false;
    }
    return true;
};

// ----------------------------------------------------
// 2. Aplicación de Callbacks y Equivalentes Nativos
// ----------------------------------------------------

// --- 2.1. array_all: Comprobar si todos los números son positivos ---
// Equivalente Nativo: array_reduce o array_filter + count. Usaremos array_filter.
$positivos = array_filter($numeros, fn($n) => $n > 0);
$todosPositivos = count($positivos) === count($numeros);
$color_1 = $todosPositivos ? 'success' : 'danger';

$resultados_html .= '
    <div class="alert alert-' . $color_1 . ' mt-3" role="alert">
        <h4 class="alert-heading">1. array_all (Todos Positivos)</h4>
        <p>¿Son todos los números (1-100) positivos? <strong>' . ($todosPositivos ? ' SÍ' : ' NO') . '</strong></p>
        <p class="mb-0">Función Nativa Utilizada: <code>count(array_filter)</code></p>
    </div>';


// --- 2.2. array_any: Comprobar si hay algún múltiplo de 5 ---
// Equivalente Nativo: array_filter + count > 0.
$multiplosDeCinco = array_filter($numeros, fn($n) => $n % 5 === 0);
$hayMultiplos = !empty($multiplosDeCinco); // Devuelve true si el array no está vacío
$color_2 = $hayMultiplos ? 'primary' : 'warning';

$resultados_html .= '
    <div class="alert alert-' . $color_2 . ' mt-3" role="alert">
        <h4 class="alert-heading">2. array_any (Algún Múltiplo de 5)</h4>
        <p>¿Hay algún múltiplo de 5? <strong>' . ($hayMultiplos ? ' SÍ' : ' NO') . '</strong></p>
        <p class="mb-0">Función Nativa Utilizada: <code>count(array_filter)</code></p>
    </div>';


// --- 2.3. array_filter: Extraer los que sean primos ---
// Función Nativa: array_filter
$primos = array_filter($numeros, $esPrimo);
$color_3 = 'info';

$resultados_html .= '
    <div class="alert alert-' . $color_3 . ' mt-3" role="alert">
        <h4 class="alert-heading">3. array_filter (Números Primos)</h4>
        <p>Números Primos extraídos: <strong>' . implode(', ', $primos) . '</strong></p>
        <p class="mb-0">Función Nativa Utilizada: <code>array_filter</code></p>
    </div>';


// --- 2.4. array_find: Primera ocurrencia de número de dos cifras idénticas ---
// Equivalente Nativo: Búsqueda con foreach o array_filter + array_values + primera posición.
$primeraOcurrencia = null;

foreach ($numeros as $num) {
    if ($num >= 11 && $num <= 99) {
        $s = (string)$num;
        if ($s[0] === $s[1]) {
            $primeraOcurrencia = $num; // El primero será 11
            break;
        }
    }
}
$color_4 = 'dark';

$resultados_html .= '
    <div class="alert alert-' . $color_4 . ' mt-3" role="alert">
        <h4 class="alert-heading">4. array_find (Primera Ocurrencia de Cifras Idénticas)</h4>
        <p>La primera ocurrencia de un número de dos cifras idénticas es: <strong>' . $primeraOcurrencia . '</strong></p>
        <p class="mb-0">Función Nativa Utilizada: Bucle <code>foreach</code> con <code>break</code></p>
    </div>';


// --- 2.5. array_map: Obtener el cuadrado de cada valor ---
// Función Nativa: array_map
// Mapeamos solo los primeros 10 valores para no saturar la salida
$primerosDiez = array_slice($numeros, 0, 10);
$cuadrados = array_map(fn($n) => $n ** 2, $primerosDiez);
$color_5 = 'warning';

$resultados_html .= '
    <div class="alert alert-' . $color_5 . ' mt-3" role="alert">
        <h4 class="alert-heading">5. array_map (Cuadrado de los Primeros 10 Valores)</h4>
        <p>Valores originales: 1 a 10</p>
        <p>Valores al cuadrado: <strong>' . implode(', ', $cuadrados) . '</strong></p>
        <p class="mb-0">Función Nativa Utilizada: <code>array_map</code></p>
    </div>';


// --- 2.6. array_walk: Sustituir cada valor por su doble ---
// Función Nativa: array_walk
$arrayOriginal = array_slice($numeros, 0, 5); // Tomamos los primeros 5 para mostrar
$dobles = $arrayOriginal; // Creamos una copia
array_walk($dobles, function (&$valor) {
    $valor *= 2; // Modificación por referencia
});
$color_6 = 'secondary';

$resultados_html .= '
    <div class="alert alert-' . $color_6 . ' mt-3" role="alert">
        <h4 class="alert-heading">6. array_walk (Duplicar Valores)</h4>
        <p>Array original (primeros 5): ' . implode(', ', $arrayOriginal) . '</p>
        <p>Array con el doble (usando **`array_walk`**): <strong>' . implode(', ', $dobles) . '</strong></p>
        <p class="mb-0">Función Nativa Utilizada: <code>array_walk</code> (modifica por referencia <code>&</code>)</p>
    </div>';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Uso de Callbacks en Funciones de Array PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4 text-secondary">Callback Functions en PHP Arrays</h1>
        <div class="card shadow-sm p-4">
            <h3 class="text-primary">Array Base: Números del 1 al 100</h3>
            <hr>
            <?php echo $resultados_html; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>