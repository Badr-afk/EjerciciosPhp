<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 - Formulario Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-dark">
                    <div class="card-header bg-dark text-white">
                        <h2 class="h4 mb-0 text-center">Formulario de Entrada de 2 Números</h2>
                    </div>
                    
                    <form action="procesar.php" method="POST"> 
                        <div class="card-body">
                            
                            <div class="mb-3">
                                <label for="num1" class="form-label">Número 1:</label>
                                <input type="number" class="form-control" id="num1" name="num1" required>
                                <div class="form-text">Introduce el primer valor numérico.</div>
                            </div>

                            <div class="mb-3">
                                <label for="num2" class="form-label">Número 2:</label>
                                <input type="number" class="form-control" id="num2" name="num2" required>
                                <div class="form-text">Introduce el segundo valor numérico.</div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 mt-3">Enviar Datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>