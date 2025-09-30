<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio1</title>
</head>
<body>
    <h2>Calculadora  básica</h2>
    
    <form action="" method="get">
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
</body>
</html>