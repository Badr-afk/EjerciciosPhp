<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php 
    //Nombre de la clase en mayuscula
    class Fruit{
    //Propiedades
    private  $name;
    private  $color;
    //Metodos
    function __construct($name,$color)
    { //Constructor
        $this->name=$name;
        $this->color=$color;
    }
    function set_name($name){
        //setter

        $this->name=$name;
    }

    
    } 
    ?>
</body>
</html>