<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio1</title>
</head>
<body>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario con Bootstrap</title>
    <!-- CDN de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Calculadora</h4>
                        <form action="" method="post">
                            
                            <div class="mb-3">
                                <label for="num1" class="form-label">Introduce el primer número</label>
                                <input type="text" name="num1" id="num1" class="form-control" placeholder="Ej. 5">
                            </div>

                            <div class="mb-3">
                                <label for="num2" class="form-label">Introduce el segundo número</label>
                                <input type="text" name="num2" id="num2" class="form-control" placeholder="Ej. 3">
                            </div>

                            <div class="mb-3">
                                <label for="operador" class="form-label">Elige un operador</label>
                                <select name="operador" id="operador" class="form-select">
                                    <option value="suma">+</option>
                                    <option value="resta">-</option>
                                    <option value="division">/</option>
                                    <option value="multiplicacion">*</option>
                                    <option value="resto">%</option>
                                </select>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS de Bootstrap (opcional para interactividad) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero1 = $_POST['num1'];
    $numero2 = $_POST['num2'];
    $operador = $_POST['operador'];        
    $resultado = null;

    // Validar que los inputs sean números
    if (is_numeric($numero1) && is_numeric($numero2)) {
        switch ($operador) {
            case 'suma':
                $resultado = $numero1 + $numero2;
                break;
            case 'resta':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicacion':
                $resultado = $numero1 * $numero2;
                break;
            case 'division':
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else{
                    echo "<p style='color:red;'>No se puede dividir por 0</p>";
                }
                break;
            case 'resto':
                $resultado = $numero1 % $numero2;
                break;
            default:
                echo "<p style='color:red;'>Operación no válida</p>";
        }
    } else {
        echo "<p style='color:red;'>Por favor ingresa números válidos</p>";
    }

    if ($resultado !== null) {
        echo "<p>El resultado es: <strong>" . $resultado . "</strong></p>";
    }
}
?>
</body>
</html>