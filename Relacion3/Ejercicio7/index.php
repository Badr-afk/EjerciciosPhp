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

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mostrarOpcion" id="dia" value="dia">
                                <label class="form-check-label" for="primos">
                                    Mostrar el día
                                </label>
                            </div>
                            <div class="form-check"> <input class="form-check-input" type="radio" name="mostrarOpcion" id="mes" value="mes">
                                <label class="form-check-label" for="divisores">
                                    Mostrar el mes
                                </label>
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Mostrar</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    // Verificamos si el usuario envió el formulario Y si seleccionó una opción
                    if (isset($_GET['fechaForm']) && isset($_GET['mostrarOpcion'])) {   

                        // Función para obtener el día de la semana (la mantenemos igual)
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
                                return $dias[$fecha->format('w')];
                            } catch (Exception $e) {
                                return "Fecha inválida";
                            }
                        }

                        // Función para obtener el nombre del mes
                        function obtenerMes($fechaString)
                        {
                            try {
                                $fecha = new DateTime($fechaString);

                                // Adaptación simple a español de los meses:
                                $meses = [
                                    '01' => 'Enero',
                                    '02' => 'Febrero',
                                    '03' => 'Marzo',
                                    '04' => 'Abril',
                                    '05' => 'Mayo',
                                    '06' => 'Junio',
                                    '07' => 'Julio',
                                    '08' => 'Agosto',
                                    '09' => 'Septiembre',
                                    '10' => 'Octubre',
                                    '11' => 'Noviembre',
                                    '12' => 'Diciembre'
                                ];

                                $numMes = $fecha->format('m');
                                return $meses[$numMes];
                            } catch (Exception $e) {
                                return "Fecha inválida";
                            }
                        }

                        $fechaUsuario = $_GET['fechaForm'];
                        $opcionSeleccionada = $_GET['mostrarOpcion'];

                        $mensajeResultado = '';

                        // --- EL BLOQUE IF/ELSE IF CLAVE ---
                        if ($opcionSeleccionada === 'dia') {
                            $resultado = obtenerDiaSemana($fechaUsuario);
                            $mensajeResultado = 'El día de la semana fue: <strong>' . $resultado . '</strong>';
                        } elseif ($opcionSeleccionada === 'mes') {
                            $resultado = obtenerMes($fechaUsuario);
                            $mensajeResultado = 'El mes de la fecha es: <strong>' . $resultado . '</strong>';
                        }
                        // ------------------------------------

                        // Mostramos el resultado en una alerta bonita
                        echo '<div class="card-footer bg-white">';
                        echo '<div class="alert alert-success m-0 text-center" role="alert">';
                        echo $mensajeResultado;
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