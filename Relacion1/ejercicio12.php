<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>
<body>
    <h2>Mostrar Calificacion</h2>
    <?php
    $nota=7;
    
    switch($nota){
        default:
            echo "Nota erronea";
            break;
        case 1:
        case 2:
        case 3:
        case 4:
            echo "Insuficiente";
            break;
        case 5:
            echo "Suficiente";
            break;
        case 6:
            echo "Bien";
            break;
        case 7:
        case 8:
            echo "Notable";
            break;
        case 9:
        case 10:
            echo "Sobresaliente";
            break;
    }
    ?>
</body>
</html>