<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>
<body>
    <?php
     $numero=$_GET["numero"];
    
     function Factorial($numero){
        if($numero==0){
             return 1;
        }
        return $numero*Factorial($numero-1);
     }
    
     echo "El factorial de ", $numero , " es " , Factorial($numero)
    ?>
</body>
</html>