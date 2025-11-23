<?php
// Inicializamos la variable para el resultado
$resultado_html = '';

// Verificamos si se ha enviado el formulario y la cadena no está vacía
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["cadena_texto"])) {

    // Obtenemos y limpiamos la cadena de texto del formulario
    $cadena = $_POST["cadena_texto"];

    // --- 1. Cadena del revés y comprobación de palíndromo ---
    $cadena_reves = strrev($cadena);

    // Limpiamos la cadena de espacios y la ponemos en minúsculas para la comprobación
    $cadena_limpia = str_replace(' ', '', strtolower($cadena));
    $cadena_limpia_reves = strrev($cadena_limpia);

    $es_palindroma = ($cadena_limpia === $cadena_limpia_reves) ? "*Sí** es palíndroma" : "*No** es palíndroma";

    $resultado_html .= '
    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">Cadena del Revés y Palíndromo</h4>
        <p>Cadena original: **' . htmlspecialchars($cadena) . '**</p>
        <p>Cadena del revés: **' . htmlspecialchars($cadena_reves) . '**</p>
        <hr>
        <p class="mb-0">Resultado de palíndromo: **' . $es_palindroma . '**.</p>
    </div>';

    // --- 2. Cadena con las palabras del revés ---
    // Explicación: 
    // 1. Explode divide la cadena en un array de palabras usando el espacio como delimitador.
    // 2. Array_map aplica la función strrev (dar la vuelta al string) a cada palabra del array.
    // 3. Implode une las palabras de nuevo en un string usando el espacio.
    $palabras_reves = array_map('strrev', explode(' ', $cadena));
    $cadena_palabras_reves = implode(' ', $palabras_reves);

    $resultado_html .= '
    <div class="alert alert-secondary" role="alert">
        <h4 class="alert-heading">Palabras del Revés</h4>
        <p>Cadena original: **' . htmlspecialchars($cadena) . '**</p>
        <p>Cadena con palabras del revés: **' . htmlspecialchars($cadena_palabras_reves) . '**</p>
    </div>';

    // --- 3. Toda en mayúsculas y toda en minúsculas ---
    $cadena_mayusculas = strtoupper($cadena);
    $cadena_minusculas = strtolower($cadena);

    $resultado_html .= '
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Mayúsculas y Minúsculas</h4>
        <p>Cadena en **mayúsculas** (usando `strtoupper`): **' . htmlspecialchars($cadena_mayusculas) . '**</p>
        <p>Cadena en **minúsculas** (usando `strtolower`): **' . htmlspecialchars($cadena_minusculas) . '**</p>
    </div>';

    // --- 4. Recuento de caracteres y palabras ---
    $num_caracteres = strlen($cadena); // Incluye espacios
    $num_palabras = str_word_count($cadena); // Cuenta las palabras

    $resultado_html .= '
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Recuento</h4>
        <p>Número de **caracteres** (incluidos espacios, `strlen`): **' . $num_caracteres . '**</p>
        <p>Número de **palabras** (`str_word_count`): **' . $num_palabras . '**</p>
    </div>';

    // --- 5. Resultados de crypt, md5 y sha1 ---
    // Usamos 'salt' para crypt. En un entorno real se generaría un salt único y seguro.
    $salt = '$2a$07$usesomesillystringforsalt$';
    $hash_crypt = crypt($cadena, $salt);
    $hash_md5 = md5($cadena);
    $hash_sha1 = sha1($cadena);

    $resultado_html .= '
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Funciones de Encriptación (Hash)</h4>
        <p>Resultado de **`crypt`** (Con un salt fijo para el ejemplo): <code>' . htmlspecialchars($hash_crypt) . '</code></p>
        <p>Resultado de **`md5`**: <code>' . htmlspecialchars($hash_md5) . '</code></p>
        <p>Resultado de **`sha1`**: <code>' . htmlspecialchars($hash_sha1) . '</code></p>
        <hr>
    </div>';
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["cadena_texto"])) {
    $resultado_html .= '
    <div class="alert alert-warning" role="alert">
        <strong>¡Atención!</strong> Debes introducir una cadena de texto para procesar.
    </div>';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Manejo de Strings en PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <header>
            <h1 class="mb-4">Funciones de Manejo de Strings en PHP</h1>
            <p>Introduce una cadena de texto y observa los resultados de varias funciones de PHP.</p>
        </header>

        <hr>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="cadena_texto" class="form-label">Introduce la cadena de texto:</label>
                <input type="text" class="form-control" id="cadena_texto" name="cadena_texto"
                    placeholder="Ej: Reconocer" value="<?php echo isset($cadena) ? htmlspecialchars($cadena) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Procesar Cadena</button>
        </form>

        <hr class="my-5">

        <section id="resultados">
            <h2>Resultados del Procesamiento</h2>
            <?php echo $resultado_html; // Mostramos los resultados aquí 
            ?>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>