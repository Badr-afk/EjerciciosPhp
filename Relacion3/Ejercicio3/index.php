<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora MCD - Euclides Recursivo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Calculadora de MCD</h4>
                        <small>Algoritmo de Euclides Recursivo</small>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST" class="row g-3">
                            <div class="col-md-6">
                                <label for="num1" class="form-label">Primer Número</label>
                                <input type="number" class="form-control" name="num1" id="num1" required min="1" placeholder="Ej: 48">
                            </div>
                            <div class="col-md-6">
                                <label for="num2" class="form-label">Segundo Número</label>
                                <input type="number" class="form-control" name="num2" id="num2" required min="1" placeholder="Ej: 18">
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-success w-100 btn-lg">
                                    Calcular MCD
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

                <?php
                // --- ZONA DE FUNCIONES ---

                // 1. Recursividad por RESTAS
                function mcdRestas($a, $b)
                {
                    if ($a == $b) return $a;
                    return ($a > $b) ? mcdRestas($a - $b, $b) : mcdRestas($a, $b - $a);
                }

                // 2. Recursividad por DIVISIÓN (Módulo)
                function mcdDivision($a, $b)
                {
                    if ($b == 0) return $a;
                    return mcdDivision($b, $a % $b);
                }

                // --- PROCESAMIENTO ---
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $n1 = intval($_POST['num1']);
                    $n2 = intval($_POST['num2']);

                    if ($n1 > 0 && $n2 > 0) {
                        // Cálculos
                        $resRestas = mcdRestas($n1, $n2);
                        $resDivision = mcdDivision($n1, $n2);
                ?>

                        <div class="card mt-4 border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-center text-secondary mb-3">Resultados para <?php echo "$n1 y $n2"; ?></h5>



                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Método</th>
                                                <th>Fórmula Base</th>
                                                <th>Resultado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Restas Sucesivas</strong></td>
                                                <td>$MCD(a-b, b)$</td>
                                                <td class="text-primary fw-bold fs-5"><?php echo $resRestas; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>División (Módulo)</strong></td>
                                                <td>$MCD(b, a \% b)$</td>
                                                <td class="text-success fw-bold fs-5"><?php echo $resDivision; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="alert alert-info d-flex align-items-center mt-2" role="alert">
                                    <div>
                                        Ambos algoritmos han devuelto el mismo valor. El método de división es computacionalmente más eficiente.
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    } else {
                        echo '<div class="alert alert-danger mt-3 text-center">Por favor, introduce números enteros mayores a 0.</div>';
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>