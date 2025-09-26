<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>
<bod>
    <h2>Factorial de un número entero</h2>
    <?php
        $num=5;
        if($num<0){
            echo "El numero debe ser un entero";
        }else{
            $factorial=1;
            for($i=$num; $i>1;$i--){
                $factorial*=$i;
            }
            echo "El resultado de $num es: $factorial";
        }
    ?>
</body>
</html>