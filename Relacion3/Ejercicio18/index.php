<?php

// --- CARTA DE PLATOS ---
$menu = [
    'entrante' => array('Ensalada César', 'Hummus', 'Boquerones al natural'),
    'primero' => array('Gazpachuelo', 'Salmorejo', 'Ajo Blanco'),
    'segundo' => array('Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'),
    'postre' => array('Helado 3 sabores', 'Flan', 'Tarta de Queso')
];

$num_menus = 0;
$menus_generados_html = '';

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_menus'])) {

    // Validar y obtener el número de menús a generar
    $num_menus = (int)$_POST['num_menus'];

    // Asegurarse de que el número sea positivo y razonable (ej. máx 10)
    if ($num_menus > 0 && $num_menus <= 10) {

        // --- BUCLE PARA GENERAR CADA MENÚ ---
        for ($i = 1; $i <= $num_menus; $i++) {

            $platos_seleccionados = [];

            // Recorrer cada categoría del menú
            foreach ($menu as $categoria => $platos) {

                // 1. Usar array_rand para obtener la clave (índice) de un plato aleatorio
                // Si el array solo tiene un elemento, array_rand devuelve la clave directamente.
                // Si tiene varios, devuelve un array de claves (pero aquí solo pedimos 1).
                $clave_aleatoria = array_rand($platos);

                // 2. Obtener el plato usando la clave aleatoria
                $plato = $platos[$clave_aleatoria];

                // 3. Almacenar la selección
                $platos_seleccionados[$categoria] = $plato;
            }

            // --- CONSTRUCCIÓN DE LA CARD DE BOOTSTRAP ---
            $menus_generados_html .= '
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card shadow-lg border-primary">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">Menú Sugerencia #' . $i . ' </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Entrante:</strong> ' . $platos_seleccionados['entrante'] . '</li>
                            <li class="list-group-item"><strong>Primer Plato:</strong> ' . $platos_seleccionados['primero'] . '</li>
                            <li class="list-group-item"><strong>Segundo Plato:</strong> ' . $platos_seleccionados['segundo'] . '</li>
                            <li class="list-group-item"><strong>Postre:</strong> ' . $platos_seleccionados['postre'] . '</li>
                        </ul>
                    </div>
                </div>
            </div>';
        }
    } else {
        $menus_generados_html = '<div class="alert alert-warning">Por favor, introduce un número entre 1 y 10.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Generador de Menús PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center mb-4 text-primary">Generador de Menús Sugerencia</h1>

        <div class="row justify-content-center mb-5">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="num_menus" class="form-label">¿Cuántos menús deseas generar? (1-10)</label>
                                <input type="number" class="form-control" id="num_menus" name="num_menus" min="1" max="10" required
                                    value="<?php echo htmlspecialchars($num_menus); ?>">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Generar Menús</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php echo $menus_generados_html; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>