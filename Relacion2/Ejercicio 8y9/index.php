<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9 - Cálculo en el mismo archivo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg">
                    <div class="card-header bg-danger text-white">
                        <h2 class="h4 mb-0 text-center">Cálculo de Operaciones (Mismo Archivo)</h2>
                    </div>
                    <div class="card-body">

                        <?php
                        // Controlar si se ha enviado el formulario (POST)
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            
                            $num1 = (float)$_POST['num1'];
                            $num2 = (float)$_POST['num2'];
                            $operacion = $_POST['operacion'];
                            $resultado = 0;

                            // **Instrucción MATCH (PHP 8+)**
                            $resultado = match ($operacion) {
                                'sumar' => $num1 + $num2,
                                'restar' => $num1 - $num2,
                                'multiplicar' => $num1 * $num2,
                                'dividir' => ($num2 != 0) ? $num1 / $num2 : 'División por cero',
                                default => 'Operación no válida'
                            };

                            // Mostrar Resultados
                            echo '<div class="alert alert-success mt-3" role="alert">';
                            echo "<h4>Resultado:</h4>";
                            echo "<p class='lead'>Has elegido la operación **$operacion**.</p>";
                            echo "<p>El resultado de $num1 $operacion $num2 es: <strong>$resultado</strong></p>";
                            echo '</div>';

                        } else {
                            // Mostrar mensaje si es la primera vez que se carga
                            echo '<div class="alert alert-info">Introduce dos números y selecciona una operación.</div>';
                        }
                        ?>

                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="num1" class="form-label">Número 1:</label>
                                    <input type="number" step="any" class="form-control" id="num1" name="num1" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="num2" class="form-label">Número 2:</label>
                                    <input type="number" step="any" class="form-control" id="num2" name="num2" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="operacion" class="form-label">Operación:</label>
                                <select class="form-select" id="operacion" name="operacion" required>
                                    <option value="" selected disabled>Selecciona una operación</option>
                                    <option value="sumar">Suma (+)</option>
                                    <option value="restar">Resta (-)</option>
                                    <option value="multiplicar">Multiplicación (*)</option>
                                    <option value="dividir">División (/)</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-danger w-100 mt-3">Calcular</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>