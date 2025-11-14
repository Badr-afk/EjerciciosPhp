<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid w-75">
        <?php 

            function compruebaAcceso($id, $pass) {
                define("USUARIO_CORRECTO", "chechu");
                define("PASS_CORRECTA", "Abrete sesamo");
                return ($id == USUARIO_CORRECTO && $pass == PASS_CORRECTA);
            }

            $idusuario = $_POST['idusuario']; // Descargo datos de formulario
            $contrasena = $_POST['contrasena'];
            unset($_SESSION['errorLogin']);
            if (compruebaAcceso($idusuario, $contrasena)) { // Si el usuario es conocido...
                setcookie("usuario", $idusuario); // Crea la cookie para siempre
                if (isset($_COOKIE['usuario'])) { // Lo muestra solo al actualizar
                    echo "Te llamas ".$_COOKIE['usuario'];
                }

                $_SESSION['usuario'] = $idusuario; // Se crea la variable de sesion
                // Se queda almacenada en el servidor
                echo "Tu eres ".$_SESSION['usuario']." según tu variable de sesión";
            } else {
                $_SESSION["errorLogin"] = true;
                header("Location: 1relacion4.php");
            }
        ?>

    </div>
</body>
</html>