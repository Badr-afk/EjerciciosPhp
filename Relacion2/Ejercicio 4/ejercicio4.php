<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Días de la Semana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <div class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h2 class="h4 mb-0">Ejercicio: Manejo de Array en PHP</h2>
            </div>
            <div class="card-body">
                
                <?php
                // Declarar el array
                $DIAS = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
                ?>

                <p class="lead border-bottom pb-2">
                    El **primer día** de la semana es: 
                    <span class="badge bg-success fs-6"><?php echo $DIAS[0]; ?></span>
                </p>

                <p class="lead border-bottom pb-2">
                    Una semana tiene 
                    <span class="badge bg-info text-dark fs-6"><?php echo count($DIAS); ?></span> días.
                </p>

                <h3 class="h5 mt-4 mb-3 text-secondary">Recorrido con for:</h3>
                
                <ol class="list-group list-group-numbered">
                <?php
                for($i = 0; $i < count($DIAS); $i++) {
                    // Usamos list-group-item de Bootstrap
                    $estilo = ($i < 5) ? 'list-group-item-light' : 'list-group-item-warning';
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center $estilo'>";
                    echo "Día número " . ($i + 1);
                    echo "<span class='badge bg-dark rounded-pill'>" . $DIAS[$i] . "</span>";
                    echo "</li>";
                }
                ?>
                </ol>
                
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>