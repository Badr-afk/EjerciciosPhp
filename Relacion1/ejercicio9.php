<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio9</title>
</head>
<body>
    <h2>Saber el tipo de triangulo</h2>
    <?php
    $lado1=7;
    $lado2=7;
    $lado3=7;
    $contador=0;
    if($lado1 == $lado2 and $lado2 == $lado3){
        echo "El triangulo es equilatero";
    }else if($lado1 == $lado2 or $lado2 or $lado3 or $lado1==$lado3){
        echo "El triangulo es isosceles";
    }else{
        echo "El triangulo es equilatero";
    };
    ?>
</body>
</html>