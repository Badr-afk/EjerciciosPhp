<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Evaluación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="h3 mb-0 text-center">Calcular Evaluación</h4>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return validarForm()">
                <div class="card-body">

                    <div class="mb-3">
                        <label for="notaIn" class="form-label">Nota Inicial</label>
                        <input type="number" step="any" class="form-control" id="notaIn" name="notaIn"
                            onfocus="limpiarError('notaIn')"
                            value="<?php echo $_POST['notaIn'] ?? ''; ?>">
                        <small id="notaInhelp" class="text-danger" style="visibility:hidden">El campo es obligatorio/numérico.</small>
                        <small id="notaInrango" class="text-danger" style="visibility:hidden">La nota debe estar entre 0 y 10.</small>
                    </div>

                    <div class="mb-3">
                        <label for="notaPrim" class="form-label">Nota Primera</label>
                        <input type="number" step="any" class="form-control" id="notaPrim" name="notaPrim"
                            onfocus="limpiarError('notaPrim')"
                            value="<?php echo $_POST['notaPrim'] ?? ''; ?>">
                        <small id="notaPrimhelp" class="text-danger" style="visibility:hidden">Error de formato.</small>
                        <small id="notaPrimrango" class="text-danger" style="visibility:hidden">La nota debe estar entre 0 y 10.</small>
                    </div>

                    <div class="mb-3">
                        <label for="notaSeg" class="form-label">Nota Segunda</label>
                        <input type="number" step="any" class="form-control" id="notaSeg" name="notaSeg"
                            onfocus="limpiarError('notaSeg')"
                            value="<?php echo $_POST['notaSeg'] ?? ''; ?>">
                        <small id="notaSeghelp" class="text-danger" style="visibility:hidden">Error de formato.</small>
                        <small id="notaSegrango" class="text-danger" style="visibility:hidden">La nota debe estar entre 0 y 10.</small>
                    </div>

                    <div class="mb-3">
                        <label for="notaTer" class="form-label">Nota Tercera</label>
                        <input type="number" step="any" class="form-control" id="notaTer" name="notaTer"
                            onfocus="limpiarError('notaTer')"
                            value="<?php echo $_POST['notaTer'] ?? ''; ?>">
                        <small id="notaTerhelp" class="text-danger" style="visibility:hidden">Error de formato.</small>
                        <small id="notaTerrango" class="text-danger" style="visibility:hidden">La nota debe estar entre 0 y 10.</small>
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label">Introduce tu correo</label>
                        <input type="text" class="form-control" id="correo" name="correo"
                            onfocus="limpiarError('correo')"
                            value="<?php echo $_POST['correo'] ?? ''; ?>">
                        <small id="correohelp" class="text-danger" style="visibility:hidden">Introduce un correo válido.</small>
                    </div>

                    <div class="mb-3">
                        <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                        <select class="form-select" id="tipoDocumento" name="tipoDocumento">
                            <option value="dni" <?php echo (isset($_POST['tipoDocumento']) && $_POST['tipoDocumento'] == 'dni') ? 'selected' : ''; ?>>DNI</option>
                            <option value="nie" <?php echo (isset($_POST['tipoDocumento']) && $_POST['tipoDocumento'] == 'nie') ? 'selected' : ''; ?>>NIE</option>
                            <option value="tie" <?php echo (isset($_POST['tipoDocumento']) && $_POST['tipoDocumento'] == 'tie') ? 'selected' : ''; ?>>TIE</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="documento" class="form-label">Dime el documento</label>
                        <input type="text" class="form-control" id="documento" name="documento"
                            onfocus="limpiarError('documento')"
                            value="<?php echo $_POST['documento'] ?? ''; ?>">
                        <small id="documentohelp" class="text-danger" style="visibility:hidden">Documento inválido.</small>
                    </div>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary">Calcular</button>
                    </div>

                    <?php
                    // Verificamos si el formulario fue enviado via POST
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        echo "<hr class='my-4'>"; // Una línea separadora visual

                        // Recogida de datos (Usamos $_POST porque cambiamos el method del form)
                        // floatval asegura que sea un número para el cálculo
                        $notaIn   = floatval($_POST['notaIn'] ?? 0);
                        $notaPrim = floatval($_POST['notaPrim'] ?? 0);
                        $notaSeg  = floatval($_POST['notaSeg'] ?? 0);
                        $notaTer  = floatval($_POST['notaTer'] ?? 0);

                        // TU LÓGICA DE CÁLCULO
                        $Rubrica = [
                            "Inicial" => 0.2,
                            "Primera" => 0.3,
                            "Segunda" => 0.2,
                            "Tercera" => 0.30
                        ];

                        $Calificaciones = [
                            "Inicial" => $notaIn,
                            "Primera" => $notaPrim,
                            "Segunda" => $notaSeg,
                            "Tercera" => $notaTer
                        ];

                        $notaFinal = 0;
                        foreach ($Rubrica as $rubrica => $valor) {
                            $notaFinal += $valor * $Calificaciones[$rubrica];
                        }

                        // MOSTRAR EL RESULTADO (Diseño integrado)
                        $claseColor = $notaFinal >= 5 ? "bg-success" : "bg-danger";

                        echo "<div class='alert alert-secondary text-center'>";
                        echo "<h5>Resultado del Cálculo</h5>";
                        echo "<p class='fs-4'>Tu nota final es: <span class='badge $claseColor'>$notaFinal</span></p>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>

    <script src="validacion.js"></script>
</body>

</html>