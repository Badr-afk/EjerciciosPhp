<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
</head>
<body>
    <h2>Mostrar los numeros primos</h2>
    <?php
        $num=13;
        $contador=2;
        $comprobador=true;
        do{
            if($num % $i ==0){
                $comprobador=false;
            }
            $contador++;
        }while($comprobador or $contador==$num);
        if($comprobador){
            echo "El numero $num es primo";
        }else{
            echo "El numero $num tiene al menos un divisor",$contador-1;
        }
    ?>
</body>
</html>