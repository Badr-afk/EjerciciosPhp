<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Temperaturas con Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="card shadow-lg border-info">
            <div class="card-header bg-info text-white">
                <h1 class="h3 mb-0">🌡️ Ejercicio 5: Temperaturas con Arrays Constantes</h1>
            </div>
            <div class="card-body">

                <?php 
                // Declarar la constante array asociativa
                const Temperaturas = [
                    "Lunes" => 21.5,
                    "Martes" => 23.2,
                    "Miércoles" => 19.8,
                    "Jueves" => 22.0,
                    "Viernes" => 24.6,
                    "Sábado" => 25.3,
                    "Domingo" => 20.7
                ];
                
                // Mostrar la temperatura del primer día de la semana
                echo "<p class='lead border-bottom pb-2'>
                        La temperatura del primer día (Lunes) es: 
                        <span class='badge bg-success fs-6'>" . Temperaturas["Lunes"] . " °C</span>
                      </p>";
                ?>
                
                <h3 class="mt-4 mb-3 text-secondary">Tabla de Temperaturas</h3>
                
                <table class="table table-striped table-hover table-bordered shadow-sm">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Día</th>
                            <th scope="col">Temperatura</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach (Temperaturas as $dia => $temp) {
                        // Lógica simple para asignar un color de Bootstrap según la temperatura
                        $clase_bg = '';
                        if ($temp >= 24) {
                            $clase_bg = 'bg-danger text-white'; // Días calurosos
                        } elseif ($temp <= 20) {
                            $clase_bg = 'bg-warning text-dark'; // Días frescos
                        } else {
                            $clase_bg = 'bg-success text-white'; // Días templados
                        }

                        echo "<tr>";
                        echo "<td><strong>$dia</strong></td>";
                        echo "<td>$temp °C</td>";
                        echo "<td><span class='badge $clase_bg'>" . (($temp >= 24) ? "Caluroso" : (($temp <= 20) ? "Fresco" : "Normal")) . "</span></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
                
                <h3 class="mt-5 mb-3 text-secondary">Componentes Adicionales de Prueba</h3>
                
                <div class="d-flex align-items-center gap-3 p-3 border rounded">
                    
                    <button type="button" class="btn btn-outline-info">Actualizar Datos</button>
                    <button type="button" class="btn btn-primary">
                      <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                      <span role="status">Cargando...</span>
                    </button>
                    
                    <ul class="list-group list-group-horizontal flex-grow-1">
                      <li class="list-group-item list-group-item-action">Promedio</li>
                      <li class="list-group-item list-group-item-action">Máxima</li>
                      <li class="list-group-item list-group-item-action">Mínima</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>