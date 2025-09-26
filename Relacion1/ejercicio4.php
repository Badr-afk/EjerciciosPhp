<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <h2>array</h2>

    <?php
    /*Declarar el array*/
    $DIAS = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    //Primer elemento del array
    echo "El primer dia de la semana es:", $DIAS[0];
    echo "<br>";
    //Contar cuantos elementos tiene un array
    echo "Una semana tiene " , count($DIAS), " dias";
    /*Recorrer un array con for*/
    echo "<br><br>Recorrido con for:<br>";
    echo "<ol>";
    for($i = 0; $i < count($DIAS); $i++) {
        echo "<li>",$DIAS[$i] ,"</li>";
    }
    echo "<ol>";
    
    ?>
</body>
</html>