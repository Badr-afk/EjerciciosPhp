<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    $divisor = $_GET['divisor'];
    $dividendo = $_GET['dividendo'];
    $cociente = 0;
    $resto = 0;
    if (isset($_GET['cociente']) && isset($_GET['resto'])) {
        $resto = $dividendo % $divisor;
        $cociente = intdiv($dividendo, $divisor);

        echo "<p class='font-monospace badge text-bg-primary text-wrap'>";
        echo "<span class='divisor'>cociente=$cociente</span> ";
        echo "<span class='divisor'>resto=$resto</span> ";
        echo "</p>";
    } else if (isset($_GET['cociente'])) {
        echo "<p class='font-monospace badge text-bg-primary text-wrap'>";
        echo "<span class='divisor'>cociente=$cociente</span> ";
        echo "</p>";
    } else if (isset($_GET['resto'])) {
        echo "<p class='font-monospace badge text-bg-primary text-wrap'>";
        echo "<span class='divisor'>resto=$resto</span> ";
        echo "</p>";
    }
    ?>
</body>

</html>