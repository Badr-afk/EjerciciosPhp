<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $numero = 160;
    $base = 16;
    $resultado = "";

    echo "El numero  original es $numero y la base a la que pasarlo $base";
    echo "<br> el resultado es: ";
    while ($numero >= $base) {
        //Intercepto el resto antes de concatenarlo o mostrarlo
        // y si es mayor que 9 lo cambio por la letra correspondiente
        $digito = $numero % $base;
        if ($digito > 9) {
            switch ($digito) {
                case 10:
                    $caracter = 'A';
                    break;
                case 11:
                    $caracter = 'B';
                    break;
                case 12:
                    $caracter = 'C';
                    break;
                case 13:
                    $caracter = 'D';
                    break;
                case 14:
                    $caracter = 'E';
                    break;
                case 15:
                    $caracter = 'F';
                    break;
            }
        } else {
            $caracter = (string) $digito;
        }

        $resultado = (string) $caracter . '-' . $resultado; //Casting eplicito
        //casting explicito de un numero entero en un dato tipo string
        $cociente = intval($numero / $base);

        $numero = $cociente;
    }

    echo (string)$numero . '-' . $resultado;
    ?>
</body>

</html>