<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Coste</title>
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
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ancho" class="form-label">Ancho de la pared(metros)</label>
                                <input type="number" class="form-control" id="ancho" name="ancho" step="any" required
                                    value="<?php echo isset($_POST['ancho']) ? htmlspecialchars($_POST['ancho']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="altura" class="form-label">Alto de la pared(metros)</label>
                                <input type="number" class="form-control" id="altura" name="altura" step="any" required
                                    value="<?php echo isset($_POST['altura']) ? htmlspecialchars($_POST['altura']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="pintura" class="form-label">Selecciona a qué lo quieres pasar</label>
                                <select name="pintura" id="operador" class="form-select">
                                    <option value="basica" <?php if (isset($_POST['pintura']) && $_POST['pintura'] == 'basica') echo 'selected'; ?>>Básica</option>
                                    <option value="premium" <?php if (isset($_POST['pintura']) && $_POST['pintura'] == 'premium') echo 'selected'; ?>>Prime</option>
                                </select>
                            </div>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Calcular</button>
                            </div>
                            <?php
                            if (isset($_POST['ancho']) && is_numeric($_POST['ancho'])) {
                                if (isset($_POST['altura']) && is_numeric($_POST['altura'])) {
                                    $altura = $_POST['altura'];
                                    $ancho = $_POST['ancho'];
                                    $pintura = $_POST['pintura'];

                                    $mensaje = '<div class="card shadow-sm" style="width: 18rem; background: linear-gradient(to bottom, #ffffff, #dbe6f6);">';
                                    $mensaje .= '  <div class="card-header bg-success text-white">Factura</div>';
                                    $mensaje .= '  <div class="card-body">';
                                    switch ($pintura) {
                                        case 'basica':
                                            $area = $altura * $ancho;
                                            $coste = $area * 10;
                                            $costeIva = ($coste * 0.21)+ $coste;

                                            $mensaje = '<h5 class="card-title">Factura Basica:</h5>';
                                            $mensaje .= '    <p class="card-text">Area: <strong>' . $area . ' m<sup>2</sup></strong></p>';
                                            $mensaje .= '    <p class="card-text">Coste sin IVA: <strong>' . $coste . ' €</strong></p>';
                                            $mensaje .= '    <p class="card-text">Coste con IVA: <strong>' . $costeIva . ' €</strong></p>';
                                            $mensaje .= '  </div>';
                                            $mensaje .= '</div>';
                                            break;
                                        case 'premium':
                                            $area = $altura * $ancho;
                                            $coste = $area * 20;
                                            $costeIva = ($coste * 0.21)+ $coste;

                                            $mensaje = '<h5 class="card-title">Factura Premium</h5>';
                                            $mensaje .= '    <p class="card-text">Area: <strong>' . $area . 'm<sup>2</sup></strong></p>';
                                            $mensaje .= '    <p class="card-text">Coste sin IVA: <strong>' . $coste . ' €</strong></p>';
                                            $mensaje .= '    <p class="card-text">Coste con IVA: <strong>' . $costeIva . ' €</strong></p>';
                                            $mensaje .= '  </div>';
                                            $mensaje .= '</div>';
                                    }
                                    echo $mensaje;
                                }
                            }
                            ?>
                        </div>
                    </form>
</body>

</html>