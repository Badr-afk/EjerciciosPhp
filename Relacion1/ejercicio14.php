<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
</head>
<body>
    <h2>Mostrar la suma total de un número</h2>
    <?php
        $num=5;
        if($num<0){
            echo "El numero debe ser un entero";
        }else{
            $factorial=1;
            for($i=$num; $i>1;$i--){
                $factorial+=$i;
            }
            echo "El resultado de $num es: $factorial";
        }
    ?>
</body>
</html>