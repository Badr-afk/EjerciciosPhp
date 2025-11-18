<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Día de la Semana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="h5 mb-0 text-center">¿Qué día cayó esta fecha?</h4>
                    </div>

                    <form action="" method="GET">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="fechaForm" class="form-label">Selecciona una fecha:</label>
                                <input type="date" class="form-control" id="fechaForm" name="fechaForm" required>
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Calcular Día</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    // Verificamos si el usuario envió el formulario
                    if (isset($_GET['fechaForm'])) {

                        function obtenerDiaSemana($fechaString)
                        {
                            $dias = [
                                'Domingo',
                                'Lunes',
                                'Martes',
                                'Miércoles',
                                'Jueves',
                                'Viernes',
                                'Sábado'
                            ];

                            try {
                                $fecha = new DateTime($fechaString);
                                // 'w' devuelve 0 (domingo) a 6 (sábado)
                                $numDia = $fecha->format('w');
                                return $dias[$numDia];
                            } catch (Exception $e) {
                                return "Fecha inválida";
                                }
                        }
                        // Llamamos a la función y guardamos el resultado
                        $fechaUsuario = $_GET['fechaForm'];
                        $resultado = obtenerDiaSemana($fechaUsuario);

                        // Mostramos el resultado en una alerta bonita
                        echo '<div class="card-footer bg-white">';
                        echo '<div class="alert alert-success m-0 text-center" role="alert">';
                        echo 'El día de la semana fue: <strong>' . $resultado . '</strong>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>