<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php
    function palabraLarga($texto)
    {
        //Limpiar texto
        $textoLimpio = preg_replace('/[[:punct:]]/', '', $texto);

        //Dividir el texto en palabra para que a la hora de compararlo se más facil
        $palabras = explode(' ', $textoLimpio);

        //Inicializar la variable que contiene el la palabra más larga
        $mayor = "";

        foreach ($palabras as $palabra) {
            if (trim($palabra) !== '') {
                if (mb_strlen($palabra) > mb_strlen($mayor)) {
                    $mayor = $palabra;
                }
            }
        }

        return $mayor;
    }
    ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="h5 mb-0 text-center">Transformar texto</h4>
                    </div>
                    <form action="" method="GET">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="textoUsu" class="form-label">Introduce el texto:</label>
                                <input type="text" class="form-control" id="textoUsu" name="textoUsu" required>
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Mostrar</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    if (isset($_GET['textoUsu'])) {
                        $texto = $_GET['textoUsu'];
                        $palabraLarga = palabraLarga($texto);

                        $mensajeResultado = "La palabra más larga es: **" . $palabraLarga . "**";

                        echo '<div class="card-footer bg-white">';
                        echo '<div class="alert alert-success m-0 text-center" role="alert">';
                        echo $mensajeResultado;
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