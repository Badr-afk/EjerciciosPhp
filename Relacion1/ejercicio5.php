<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <link rel="stylesheet" href=".css">
</head>
<body>
    <h2>Temperaturas</h2>
    <?php   
        const Temperaturas=[
            "Lunes" => 21.5,
            "Martes" => 23.2,
            "Miércoles" => 19.8,
            "Jueves" => 22.0,
            "Viernes" => 24.6,
            "Sábado" => 25.3,
            "Domingo" => 20.7
        ];

      //Mostrar la temperatura del prime dia de la semana
      echo "La temperatura del primer dia de la semana (Lunes) es: ",Temperaturas["Lunes"],"<br>";
      
      //La temperatura de todos los días, secuencialmente
       echo "Temperaturas de la semana:<br>";
        foreach (Temperaturas as $dia => $temp) {
            echo "$dia: $temp °C<br>";
        }
        //lo mismo que el anterior, pero en formato de lista numerada
        echo "<ol>";
            echo "Temperaturas de la semana:<br>";
         foreach (Temperaturas as $dia => $temp) {
            echo"<li>$dia: $temp °C </li><br>" ;
        }
        echo "</ol>";

        //Ahora con una tabla
        echo "<table style='border: solid black 1px;'>";
            foreach (Temperaturas as $dia => $temp) {
            echo"<tr>
                    <td>$dia</td> <td>$temp °C</td>
                <tr>";
            }
        echo "</table>"
    ?>
</body>
</html>