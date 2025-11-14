<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header bg-danger text-white text-center">
                        <h2 class="mb-0">Calculadora Básica</h2>
                    </div>
                    <div class="card-body">
                        <form action="proceso.php" method="post">
                            <div class="mb-3">
                                <label for="idusuario" class="form-label">Identificador</label>
                                <input type="text" name="idusuario" class="form-control" id="idusuario">
                                <!-- <div id="idusuarioHelp" class="form-text">We'll never share your user with anyone else.</div> -->
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" name="contrasena" class="form-control" id="contrasena">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        if (isset($_SESSION['errorLogin'])) {
            echo "Usuario o contraseña desconocida";
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>