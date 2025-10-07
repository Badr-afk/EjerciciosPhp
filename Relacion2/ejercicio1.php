<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio1</title>
</head>
<body>
    <h2>Calculadora  básica</h2>
    
    <form action="" method="post">
        <div class="form"> 
            <label for="num1">Introduce el número </label>
            <input type="text" name="num1" id="num1">
        </div>

        <div class="form">
        <label for="num2">Introduce el número </label>
        <input type="text" name="num2" id="num2">
        </div>
        <div>
            <label for="operador">Elige un operador</label>
            <select name="operador" id="operador">
                <option value="suma">+</option>
                <option value="resta">-</option>
                <option value="division">/</option>
                <option value="multiplicacion">*</option>
                <option value="resto">%</option>
            </select>
        </div>
        <input type="submit" value="Enviar">
    </form>

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
                } else {
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