<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ejercicio 8</title>
</head>
<body>
    <h2>Calcular la nota a partir de cuatro notas numéricas</h2>

    <?php
        // 3. MOVIDO: Las variables $_GET deben estar DENTRO del bloque PHP
        // 4. MEJORADO: Usamos '?? 0' para evitar errores si las variables no llegan
        $notaIn = $_GET['notaIn'] ?? 0;
        $notaPrim = $_GET['notaPrim'] ?? 0;
        $notaSeg = $_GET['notaSeg'] ?? 0;
        $notaTer = $_GET['notaTer'] ?? 0;

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
        
        echo "<div class='card-footer mt-3'>";
        echo "<p class='mb-1'>Tu nota es: <span class='bg bg-primary text-white p-1 rounded'>$notaFinal</span></p>";
        echo "</div>";
    ?>
</body>
</html>