<?php

$menu = [
    'entrante' => array('Ensalada César', 'Hummus', 'Boquerones al natural'),
    'primero' => array('Gazpachuelo', 'Salmorejo', 'Ajo Blanco'),
    'segundo' => array('Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'),
    'postre' => array('Helado 3 sabores', 'Flan', 'Tarta de Queso')
];

$imagenes_primeros = [
    'Gazpachuelo' => 'img/gazpachuelo.jpg',
    'Salmorejo' => 'img/salmorejo.jpg',
    'Ajo Blanco' => 'img/ajo_blanco.jpg'
];

$num_menus = 0;
$menus_generados_html = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_menus'])) {

    $num_menus = (int)$_POST['num_menus'];

    if ($num_menus > 0 && $num_menus <= 10) {

        for ($i = 1; $i <= $num_menus; $i++) {

            $platos_seleccionados = [];
            $url_imagen_plato = '';

            foreach ($menu as $categoria => $platos) {

                $pesos = array_fill(0, count($platos), 1);
                if (count($platos) >= 3) {
                    $pesos[2] = 2;
                }

                $selecciones = [];
                foreach ($platos as $index => $plato) {
                    $selecciones = array_merge($selecciones, array_fill(0, $pesos[$index], $plato));
                }

                $clave_aleatoria = array_rand($selecciones);
                $plato_seleccionado = $selecciones[$clave_aleatoria];

                $platos_seleccionados[$categoria] = $plato_seleccionado;

                if ($categoria === 'primero' && isset($imagenes_primeros[$plato_seleccionado])) {
                    $url_imagen_plato = $imagenes_primeros[$plato_seleccionado];
                }
            }

            $menus_generados_html .= '
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card shadow-lg border-success">
                    <div class="card-header bg-success text-white text-center">
                        <h5 class="mb-0">Menú Ponderado Sugerencia #' . $i . '</h5>
                    </div>';

            if (!empty($url_imagen_plato)) {
                $menus_generados_html .= '
                    <img src="' . htmlspecialchars($url_imagen_plato) . '" class="card-img-top" alt="Imagen de ' . htmlspecialchars($platos_seleccionados['primero']) . '">
                ';
            }

            $menus_generados_html .= '
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
    <title>Generador de Menús Ponderado PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center mb-4 text-success">Generador de Menús Ponderado (V2)</h1>
        <p class="text-center text-muted">La tercera opción de cada plato es el doble de probable. Se muestra la imagen del primer plato.</p>

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
                            <button type="submit" class="btn btn-success w-100">Generar Menús Ponderados</button>
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