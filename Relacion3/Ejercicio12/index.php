<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12: Ordenación Burbuja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .list-group-item-bubble {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="h5 mb-0 text-center">Implementación del Algoritmo de Burbuja</h4>
                    </div>

                    <?php
                    // Función auxiliar de intercambio (Swap)
                    function swap(&$a, &$b)
                    {   
                        $temp = $a;
                        $a = $b;
                        $b = $temp;
                    }

                    // --- FUNCIÓN PRINCIPAL DE ORDENACIÓN POR BURBUJA ---
                    
                    /**
                     * Ordena un array de strings en orden ascendente usando el algoritmo Bubble Sort.
                     * El array se modifica por referencia.
                     * @param array<string> &$arr El array de strings a ordenar (pasado por referencia).
                     * @return void
                     */
                    function bubbleSort(&$arr): void
                    {
                        $n = count($arr);
                        // Bucle exterior: controla las pasadas por el array
                        for ($i = 0; $i < $n - 1; $i++) {
                            // Bucle interior: realiza las comparaciones e intercambios
                            for ($j = 0; $j < $n - $i - 1; $j++) {
                                
                                // Compara el elemento actual con el siguiente. 
                                // Si el actual es mayor que el siguiente (mayor alfabéticamente), ¡intercámbialos!
                                if ($arr[$j] > $arr[$j + 1]) {
                                    // Usamos la función swap para intercambiar los elementos
                                    swap($arr[$j], $arr[$j + 1]);
                                }
                            }
                        }
                    }
                                
                    $datos = ['Pérez', 'García', 'López', 'Márquez', 'Álvarez', 'Domínguez', 'Ruíz', 'Díaz'];
                    
                    // Guardamos una copia del array original para mostrar el estado inicial
                    $datos_originales = $datos; 

                    ?>

                    <div class="card-body">
                        <h5 class="card-title text-center text-primary">Estado Inicial del Array</h5>
                        <ul class="list-group mb-4">
                            <?php foreach ($datos_originales as $dato): ?>
                                <li class="list-group-item list-group-item-bubble text-center"><?= $dato ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="card-footer bg-white text-center">
                        <h5 class="card-title text-success">Resultado de la Ordenación (Bubble Sort)</h5>
                        
                        <?php
                        // Llamada a la función de ordenación. 
                        // El array $datos se modifica directamente gracias a la referencia (&).
                        bubbleSort($datos);
                        ?>

                        <ul class="list-group mt-3">
                            <?php foreach ($datos as $dato): ?>
                                <li class="list-group-item list-group-item-success text-center">
                                    <strong><?= $dato ?></strong>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="mt-3 text-muted small">
                            El array original ha sido modificado en su sitio gracias al envío por referencia (`&`).
                        </p> 
                    </div>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>