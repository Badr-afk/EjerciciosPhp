<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10 - Resultado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <a href="formulario_calculo.html" class="btn btn-sm btn-outline-secondary mb-4">← Volver al Formulario</a>
                <div class="card shadow-lg border-primary">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4 mb-0 text-center">Resultados de la Operación</h2>
                    </div>
                    <div class="card-body">
                    
                        <?php
                        // 1. Control básico de seguridad y existencia de datos
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['num1'], $_POST['num2'], $_POST['operacion'])) {
                            
                            $num1 = (float)$_POST['num1'];
                            $num2 = (float)$_POST['num2'];
                            $operacion = $_POST['operacion'];
                            $resultado = 0;

                            // Uso de MATCH para el procesamiento
                            $resultado = match ($operacion) {
                                'sumar' => $num1 + $num2,
                                'restar' => $num1 - $num2,
                                'multiplicar' => $num1 * $num2,
                                'dividir' => ($num2 != 0) ? $num1 / $num2 : 'Error: División por cero.',
                                default => 'Error: Operación no reconocida.'
                            };
                            
                            // Mostrar Resultado en una alerta de Bootstrap
                            echo '<div class="alert alert-success" role="alert">';
                            echo "<h4 class='alert-heading'>Cálculo Finalizado</h4>";
                            echo "<p>Valores introducidos: **$num1** y **$num2**.</p>";
                            echo "<p class='lead'>Resultado de la operación **$operacion**: <strong>" . htmlspecialchars($resultado) . "</strong></p>";
                            echo '</div>';

                        } else {
                            // Si se accede directamente a procesar.php sin POST
                            echo '<div class="alert alert-danger">Acceso inválido. Por favor, utiliza el formulario para enviar datos.</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>