<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"


        </head>
</head>

<body>
    <div class="container-fluid w-75">

        <?php

        function compruebaAcceso($id, $pass)
        {
            define("USUARIO_CORRECTO", "Ali baba");
            define("PASS_CORRECTA", "Abrete sesamo");

            return ($id == USUARIO_CORRECTO && $pass == PASS_CORRECTA);
        }

        $idUsuario = $_POST[$idUsuario];
        $idContraseña = $_POST[$idContraseña];
        if (compruebaAcceso($idUsuario, $idContraseña)) {
            setcookie("usuario", $idUsuario);

            if (isset($_COOKIE('usuario'))) {
                echo "Te llamas ", $_COOKIE["usuario"];
            }
            $_SESSION['usuario']=$idUsuario;

            echo "Tu eres", $_SESSION['usuario'];
        } else {
            echo "Usuario y contraseña erroneo";
        }
        ?>
    </div>
</body>

</html>