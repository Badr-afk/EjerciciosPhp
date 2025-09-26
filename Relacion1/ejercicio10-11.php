<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10 y 11</title>
</head>
<body>
    <h2>Resolver ecuacion de segundo grado</h2>
    <?php
        $a=1;
        $b=-4;
        $c=2;

        if($a=0){
            echo "No es una ecuación de segundo grado y su resultado seria:-$c/$b";
        }elseif($b=0){
            $x1=-sqrt(-$c/$a);
            $x2=sqrt(-$c/$a);
            echo "Las raices son:$x1 y $x2";
        }elseif($c=0){
            $x1=0;
            $x2=-$b/$a;
            echo "Las raices son:$x1 y $x2";
        }else{
            $radical=pow($b,2)-4*$a*$c;
            if($radical<0){
                echo"Las raices no son reales";
            }else{
                $x1=(-$b +sqrt($radical))/(2-$a);
                $x2=(-$b -sqrt($radical))/(2-$a);
                echo "Las raices son:$x1 y $x2";
            }
        }
    ?>
</body>
</html>