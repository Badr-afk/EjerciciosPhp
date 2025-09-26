<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <h2>Programa a partir de dos notas</h2>
    <?php
        $nota1=7;
        $nota2=9;
        $fallos=2;

        $resultado=(($nota1+$nota2)/2)-$fallos*0.25;

        if($resultado>=5){
            echo "Estas aprobado:$resultado";
        }elseif($resultado<5){
            echo "estas suspenso:%resultado";
        }
     ?>   
</body>
</html>