<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Dados con PHP y Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .progress {
            height: 20px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <div class="text-center mb-4">
                    <h1 class="display-5 fw-bold text-primary">Simulador Matemático</h1>
                    <p class="lead text-secondary">Comparativa de dado Equiprobable vs. Trucado</p>
                </div>

                <div class="card shadow-sm mb-4 border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Configuración de la Simulación</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="tiradas" class="form-label fw-bold">Número de tiradas:</label>
                                <input type="number" class="form-control form-control-lg" name="tiradas" id="tiradas"
                                    min="1" max="1000000" placeholder="Ej: 10000" required>
                                <div class="form-text">Recomendado entre 1,000 y 100,000 para ver la tendencia clara.</div>
                            </div>
                            <button type="submit" class="btn btn-success w-100 btn-lg">
                                Simular Lanzamientos
                            </button>
                        </form>
                    </div>
                </div>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tiradas'])) {
                    $numTiradas = intval($_POST['tiradas']);

                    // Inicialización de arrays
                    $dadoNormal = array_fill(1, 6, 0);
                    $dadoTrucado = array_fill(1, 6, 0);

                    // Bucle de simulación
                    for ($i = 0; $i < $numTiradas; $i++) {

                        // 1. Dado Normal
                        $dadoNormal[mt_rand(1, 6)]++;

                        // 2. Dado Trucado (Probabilidad del 6 triplicada)
                        // Espacio muestral total = 5 (caras normales) + 3 (peso del 6) = 8
                        $azar = mt_rand(1, 8);
                        if ($azar <= 5) {
                            $resTrucado = $azar;
                        } else {
                            $resTrucado = 6;
                        }
                        $dadoTrucado[$resTrucado]++;
                    }
                ?>

                    <div class="card shadow-sm border-0 animate__animated animate__fadeIn">
                        <div class="card-header bg-white border-bottom">
                            <h4 class="text-center mb-0">Resultados tras <strong><?php echo number_format($numTiradas); ?></strong> tiradas</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle mb-0">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th>Cara</th>
                                            <th>Dado Normal (%)</th>
                                            <th>Dado Trucado (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($cara = 1; $cara <= 6; $cara++) {
                                            // Cálculos
                                            $pNormal = ($dadoNormal[$cara] / $numTiradas) * 100;
                                            $pTrucado = ($dadoTrucado[$cara] / $numTiradas) * 100;

                                            // Estilos condicionales
                                            $rowClass = ($cara == 6) ? "table-warning border-start border-warning border-5" : "";
                                            $badgeClass = ($cara == 6) ? "bg-danger" : "bg-secondary";
                                            $textoTrucado = ($cara == 6) ? "fw-bold text-danger" : "";
                                        ?>
                                            <tr class="<?php echo $rowClass; ?>">
                                                <td class="text-center fs-4 fw-bold text-secondary"><?php echo $cara; ?></td>

                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="small text-muted mb-1">Freq: <?php echo $dadoNormal[$cara]; ?></span>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: <?php echo $pNormal; ?>%">
                                                                <?php echo number_format($pNormal, 1); ?>%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="small text-muted mb-1 <?php echo $textoTrucado; ?>">Freq: <?php echo $dadoTrucado[$cara]; ?></span>
                                                        <div class="progress">
                                                            <div class="progress-bar <?php echo ($cara == 6) ? 'bg-danger progress-bar-striped progress-bar-animated' : 'bg-success'; ?>"
                                                                role="progressbar"
                                                                style="width: <?php echo $pTrucado; ?>%">
                                                                <?php echo number_format($pTrucado, 1); ?>%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-light text-muted text-center fst-italic">
                            <small>El 6 en el dado trucado debería aproximarse teóricamente al 37.5%.</small>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>