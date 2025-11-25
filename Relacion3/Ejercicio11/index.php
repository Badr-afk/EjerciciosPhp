<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="h5 mb-0 text-center">Cambiar parametros</h4>
                    </div>
                    <form action="" method="GET">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="a" class="form-label">Valor a:</label>
                                <input type="text" class="form-control" id="a" name="a" required>
                            </div>
                            <div class="mb-3">
                                <label for="b" class="form-label">Valor b:</label>
                                <input type="text" class="form-control" id="b" name="b" required>
                            </div>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Mostrar</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    // Paso 1: Corregir la función usando REFERENCIAS (&) y la LÓGICA correcta
                    function swap(&$a, &$b)
                    {
                        // Usamos una variable temporal ($temp) para el intercambio.
                        $temp = $a;
                        $a = $b;
                        $b = $temp;
                    }

                    // --------------------------------------------------------------------------------

                    // Paso 2: El script principal que recibe los valores
                    if (isset($_GET['a']) && isset($_GET['b'])) {

                        // Se recomienda convertir a entero o usar htmlspecialchars para seguridad
                        $a = htmlspecialchars($_GET['a']);
                        $b = htmlspecialchars($_GET['b']);

                        echo '<div class="card-footer bg-white">';
                        echo '<div class="alert alert-success m-0 text-center" role="alert">';

                        echo "Valores Iniciales: ";
                        echo "a = " . $a . " | ";
                        echo "b = " . $b . "<br>";

                        // Llamamos a la función swap, ahora modificará $a y $b originales
                        swap($a, $b);

                        echo "Valores Intercambiados: ";
                        echo "a = " . $a . " | ";
                        echo "b = " . $b;

                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>