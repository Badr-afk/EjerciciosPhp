<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="h5 mb-0 text-center">Cálculo de Geometría</h4>
                    </div>
                    <form action="" method="GET">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="num" class="form-label">Introduce un número (Radio/Diámetro)</label>
                                <input type="number" class="form-control" id="num" name="num" step="any" required
                                    value="<?php echo isset($_GET['num']) ? htmlspecialchars($_GET['num']) : ''; ?>">
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Calcular</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    // Inicializar la variable $resultado antes de usarla
                    $resultado = '';

                    if (isset($_GET['num']) && is_numeric($_GET['num'])) {
                        // 1. Convertir a flotante
                        $numero = (float)$_GET['num'];

                        // --- Funciones Anónimas (Closures) ---

                        // Circunferencia (C = Pi * Diámetro)
                        $circunferencia = function ($number) {
                            return M_PI * $number;
                        };

                        // Área del Círculo (A = Pi * Radio^2)
                        $circulo = function ($number) {
                            return M_PI * ($number ** 2);
                        };

                        // Volumen de la Esfera (V = 4/3 * Pi * Radio^3)
                        $esfera = function ($number) {
                            return (4 / 3) * M_PI * ($number ** 3);
                        };

                        // --- Mostrar Resultados (Con formato de 2 decimales y unidades correctas) ---
                        $resultado .= ' 
                        <div class="alert alert-success mt-3" role="alert">
                            <h4 class="alert-heading">Resultados del Cálculo con Radio/Diámetro = ' . $numero . '</h4>
                            <p>Circunferencia (asumiendo diámetro): **' . number_format($circunferencia($numero), 2) . '** cm</p>
                            <p>Área del Círculo (asumiendo radio): **' . number_format($circulo($numero), 2) . '** cm²</p>
                            <p>Volumen de la Esfera (asumiendo radio): **' . number_format($esfera($numero), 2) . '** cm³</p>
                            <hr>
                            <small class="text-muted">Nota: Por convención, la circunferencia asume el valor como Diámetro, y el Área/Volumen como Radio.</small>
                        </div>';
                    }

                    echo $resultado;
                    ?>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>