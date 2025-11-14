<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="h3 mb-0 text-center">Pasar a Binario, Octal o Hexadecimal</h4>
            </div>

            <form action="" method="get" onsubmit="return validarForm()">

                <div class="card-body">
                    <div class="mb-3">
                        <label for="numero" class="form-label">Introduce el dividendo</label>
                        <input type="text" class="form-control" id="numero" name="numero" 
                               value="<?php echo isset($_GET['numero']) ? htmlspecialchars($_GET['numero']) : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="operador" class="form-label">Selecciona a qué lo quieres pasar</label>
                        <select name="operador" id="operador" class="form-select">
                            <option value="binario" <?php if(isset($_GET['operador']) && $_GET['operador'] == 'binario') echo 'selected'; ?>>Binario</option>
                            <option value="octal" <?php if(isset($_GET['operador']) && $_GET['operador'] == 'octal') echo 'selected'; ?>>Octal</option>
                            <option value="hexadecimal" <?php if(isset($_GET['operador']) && $_GET['operador'] == 'hexadecimal') echo 'selected'; ?>>Hexadecimal</option>
                        </select>
                    </div>

                    <div id="numerohelp" class="form-text text-danger fw-bold" style="visibility: hidden;">
                        Error: No puede ser texto, debe ser un número.
                    </div>
                    
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary">Pasar</button>
                    </div>

                    <hr class="my-4">

                    <?php 
                    if (isset($_GET['numero']) && is_numeric($_GET['numero'])) {
                        $num = intval($_GET['numero']);
                        $op = $_GET['operador'];
                        $res = "";
                        $base = "";

                        switch ($op) {
                            case 'binario':
                                $res = decbin($num);
                                $base = "Binario";
                                break;
                            case 'octal':
                                $res = decoct($num);
                                $base = "Octal";
                                break;
                            case 'hexadecimal':
                                $res = strtoupper(dechex($num));
                                $base = "Hexadecimal";
                                break;
                        }

                        echo "<div class='alert alert-success text-center'>";
                        echo "El número <strong>$num</strong> en base <strong>$base</strong> es: <h3>$res</h3>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validarForm() {
            // 1. Limpiamos errores previos siempre al intentar enviar
            limpiarError('numero');

            let numeroInput = document.getElementById('numero').value;
            
            // parseFloat devuelve NaN si está vacío o es texto puro
            let numero = parseFloat(numeroInput); 
            
            var comprobador = true;
            
            // Validamos si es NaN (No es un número)
            if (isNaN(numero)) {
                marcarError('numero', "er1");
                comprobador = false;
            }
            
            return comprobador;
        }

        function marcarError(parametro, er) {
            if (er === "er2") {
                // Nota: Este div no existe en tu HTML actual, pero dejo la lógica por si lo añades
                var divRango = document.getElementById(parametro + "rango");
                if(divRango) divRango.style.visibility = "visible";
            } else if (er === "er1") {
                document.getElementById(parametro + "help").style.visibility = "visible";
            }
        }

        function limpiarError(parametro) {
            document.getElementById(parametro + "help").style.visibility = "hidden";
        }
    </script>
</body>
</html>