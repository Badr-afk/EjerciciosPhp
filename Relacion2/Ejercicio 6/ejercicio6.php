<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 - Listado de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php
    // 1. Array de datos simulados
    $personas = [
        [
            'id' => 1,
            'nombre' => 'María',
            'apellido' => 'Sánchez Torres',
            'correo' => 'maria.st@mail.com',
            'telefono' => '600 11 22 33',
            'activo' => true
        ],
        [
            'id' => 2,
            'nombre' => 'Carlos',
            'apellido' => 'Ruiz Pardo',
            'correo' => 'carlos.rp@mail.com',
            'telefono' => '600 44 55 66',
            'activo' => true
        ],
        [
            'id' => 3,
            'nombre' => 'Elena',
            'apellido' => 'Gómez Vidal',
            'correo' => 'elena.gv@mail.com',
            'telefono' => '600 77 88 99',
            'activo' => false
        ],
        [
            'id' => 4,
            'nombre' => 'Javier',
            'apellido' => 'López Martín',
            'correo' => 'javier.lm@mail.com',
            'telefono' => '600 10 12 14',
            'activo' => true
        ],
        [
            'id' => 5,
            'nombre' => 'Laura',
            'apellido' => 'Díaz Cano',
            'correo' => 'laura.dc@mail.com',
            'telefono' => '600 16 18 20',
            'activo' => false
        ]
    ];
    ?>

    <div class="container my-5">
        <div class="card shadow-lg border-primary">
            <div class="card-header bg-primary text-white">
                <h1 class="h3 mb-0">👥 Listado de Personas (Simulación de Datos)</h1>
            </div>
            <div class="card-body p-0">
                
                <table class="table table-striped table-hover table-responsive">
                    
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col" class="text-center">Estado</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                    foreach ($personas as $persona) {
                        // Determinar el estilo de la fila si está inactiva
                        $clase_fila = $persona['activo'] ? '' : 'table-secondary'; 
                        
                        // Determinar el Badge (etiqueta) para el estado
                        $badge_clase = $persona['activo'] ? 'bg-success' : 'bg-danger';
                        $badge_texto = $persona['activo'] ? 'Activo' : 'Inactivo';
                        
                        echo "<tr class='$clase_fila'>";
                        echo "<th scope='row'>{$persona['id']}</th>";
                        echo "<td><strong>{$persona['nombre']}</strong> {$persona['apellido']}</td>";
                        echo "<td>{$persona['correo']}</td>";
                        echo "<td>{$persona['telefono']}</td>";
                        echo "<td class='text-center'><span class='badge $badge_clase'>$badge_texto</span></td>";
                        echo "<td class='text-center'>";
                        
                        // Botones de acción
                        echo "<button class='btn btn-sm btn-outline-info me-2'>Ver</button>";
                        
                        // Botón Editar, deshabilitado si está inactivo
                        $btn_editar_clase = $persona['activo'] ? 'btn-warning' : 'btn-secondary disabled';
                        echo "<button class='btn btn-sm $btn_editar_clase'>Editar</button>";

                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
                
            </div>
            <div class="card-footer text-muted">
                Listado simulado de 5 registros.
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>