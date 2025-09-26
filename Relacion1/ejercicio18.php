<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 18</title>
</head>
<body>
    <h2>Calculo de maximo comun divisor</h2>
    <?php
        $num1= 12;
        $num2= 8;

        while($num1 != $num2){
            if($num1>$num2){
                $num1 -= $num2;
            }else{
                $num2 -= $num1;
            }
        }

        echo " El MCD es $num1"
    ?>
</body>
</html>