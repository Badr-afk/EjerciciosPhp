<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="h3 mb-0 text-center">Mostrar factorial o Divisores</h4>
            </div>

            <form action="proceso.php" method="get" onsubmit="return validarForm()">

                <div class="card-body">
                    <div class="mb-3">
                        <label for="num" class="form-label">Introduzca el nombre</label>
                        <input type="text" class="form-control" id="idUsuario" name="idUsuario">
                    </div>

                    <div class="mb-3">
                        <label for="num" class="form-label">Introduzca la contraseña</label>
                        <input type="text" class="form-control" id="idContraseña" name="idContraseña">
                    </div>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="validacion.js"></script>
</body>

</html>