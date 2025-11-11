<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <body>
        <div class="container my-5">
            <?php
            // 1. INICIALIZAR la sesión (solo la primera vez)
            if (!isset($_SESSION['a'])) {
                $_SESSION['a'] = 0;
                $_SESSION['b'] = 0;
            }

            // 2. PROCESAR el formulario (si se ha enviado)
            if (isset($_POST['enviar'])) { // Usamos $_POST
                switch ($_POST['operacion']) { // Usamos $_POST
                    case "+a":
                        $_SESSION['a']++;
                        break;
                    case "+b":
                        $_SESSION['b']++;
                        break;
                    case "-a":
                        $_SESSION['a']--;
                        break;
                    case "-b":
                        $_SESSION['b']--;
                        break;
                }

                // 3. REDIRIGIR para evitar reenvío con F5
                // Esto recarga la página limpiamente después de procesar los datos.
                header('Location: ' . htmlspecialchars($_SERVER['PHP_SELF']));
                exit;
            }
            ?>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h3 mb-0 text-center">A: <?php echo $_SESSION['a']; ?></h1>
                    <h1 class="h3 mb-0 text-center">B: <?php echo $_SESSION['b']; ?></h1>
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                    <div class="card-body">
                        <div class="mb-3">
                            <select name="operacion" id="operacion" class="form-select">
                                <option value="+a">Incrementar A</option>
                                <option value="+b">Incrementar B</option>
                                <option value="-a">Decrementar A</option>
                                <option value="-b">Decrementar B</option>
                            </select>
                        </div>
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary" name="enviar">Guardar</button>
                        </div>
                    </div>
                </form>

                <?php
                // Este bloque PHP ya no va aquí
                ?>
            </div>
        </div>
    </body>
</body>

</html>