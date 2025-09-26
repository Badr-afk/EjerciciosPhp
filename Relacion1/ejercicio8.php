<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
   <h2>Calcular la nota a partir de dos notas númericas</h2>
    <?php
     $Rubrica=[
        "Inicial"=>0.2,
        "Primera"=>0.3,
        "Segunda"=>0.2,
        "Tercera"=>0.30];

     $Calificaciones=[
        "Inicial"=>7,
        "Primera"=>8,
        "Segunda"=>9,
        "Tercera"=>10];
      
     $notaFinal=0;
    foreach($Rubrica as $rubrica =>$valor){
       $notaFinal+=$valor* $Calificaciones[$rubrica];
    }   
    echo "tu nota es: $notaFinal"
    ?>
</body>
</html>