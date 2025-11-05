<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>
<bod>
    <h2>Resultado:</h2>
    <?php
    $num = $_GET['num'];
    $factorial = 1;
    for ($i = $num; $i > 1; $i--) {
        $factorial *= $i;
    }
    echo "El Factorial de $num es: $factorial";

    ?>
    </body>

</html>