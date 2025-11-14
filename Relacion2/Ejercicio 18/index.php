<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 18 - Conversor de Base</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>


<body>
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="h3 mb-0 text-center">Conversor de Base Numérica</h4>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                <div class="card-body">
                    <div class="mb-3">
                        <label for="num" class="form-label">Introduzca el número (en base 10)</label>
                        <input type="text" class="form-control" id="num" name="num">
                    </div>

                    <div class="mb-3">
                        <label for="base" class="form-label">Introduzca la base (ej: 2 para binario, 8, 16...)</label>
                        <input type="text" class="form-control" id="base" name="base">
                    </div>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary">Calcular</button>
                    </div>
                </div>
            </form>

            <?php
            // --- INICIO DEL BLOQUE PHP CORREGIDO ---

            /*
             * BUENA PRÁCTICA / ERROR CRÍTICO CORREGIDO:
             * Todo el procesamiento PHP debe estar dentro de esta comprobación.
             * Esto asegura que el código solo se ejecute cuando el usuario envía el formulario (método POST),
             * y evita errores "Undefined array key" la primera vez que se carga la página (método GET).
             */
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // 1. OBTENER Y VALIDAR DATOS
                // Obtenemos los datos (inputs) del formulario
                $num_input = $_POST['num'];
                $base_input = $_POST['base'];

                // Variables para guardar el resultado o los mensajes de error
                $resultado_final = "";
                $error_msg = "";

                // VALIDACIÓN 1: Comprobar que los campos no estén vacíos
                if (empty($num_input) || empty($base_input)) {
                    $error_msg = "Error: Ambos campos (número y base) son obligatorios.";
                }
                // VALIDACIÓN 2: Comprobar que sean valores numéricos
                elseif (!is_numeric($num_input) || !is_numeric($base_input)) {
                    $error_msg = "Error: Los valores introducidos deben ser numéricos.";
                }
                // Si las validaciones básicas pasan, convertimos a enteros y continuamos
                else {
                    $numero = intval($num_input); // Convierte el input a entero
                    $base = intval($base_input);   // Convierte la base a entero

                    // VALIDACIÓN 3: La base debe ser al menos 2 (binario)
                    if ($base < 2) {
                        $error_msg = "Error: La base debe ser 2 o mayor.";
                    }
                    // VALIDACIÓN 4: Esta lógica simple no maneja números negativos
                    elseif ($numero < 0) {
                        $error_msg = "Error: Este script no puede convertir números negativos.";
                    }
                }

                // 2. PROCESAR SI NO HAY ERRORES

                // Si la variable $error_msg sigue vacía, significa que todas las validaciones fueron exitosas.
                if (empty($error_msg)) {

                    /*
                     * LÓGICA DE CONVERSIÓN DE BASE (CORREGIDA)
                     * El método consiste en divisiones sucesivas.
                     * Ejemplo: Convertir 10 (decimal) a base 2 (binario).
                     * * 10 / 2 = 5 (Resto: 0)
                     * 5 / 2 = 2 (Resto: 1)
                     * 2 / 2 = 1 (Resto: 0)
                     * 1 / 2 = 0 (Resto: 1) <--- El último cociente es 1.
                     * * El resultado se lee de abajo hacia arriba: 1010.
                     *
                     * El código original casi lo hacía bien, pero guardaba los restos al revés
                     * y añadía guiones de forma incorrecta.
                     */

                    // Guardamos el número original para mostrarlo al final
                    $numero_original = $numero;

                    // Usamos un array para guardar los "dígitos" (los restos)
                    $digitos = [];

                    // Bucle principal: se ejecuta mientras el número sea mayor o igual que la base
                    while ($numero >= $base) {
                        // 1. Calcula el resto (módulo) y lo añade al final del array
                        $digitos[] = $numero % $base;
                        // 2. Actualiza el número al cociente (parte entera de la división)
                        $numero = intval($numero / $base);
                    }

                    // 3. Añade el último cociente (que siempre es < $base) al array.
                    // Este será el primer dígito del número en la nueva base.
                    $digitos[] = $numero;

                    // 4. Invertimos el array (porque los calculamos del último al primero)
                    //    y lo unimos con un guion.
                    // Ejemplo (10 base 2): $digitos = [0, 1, 0, 1]
                    // array_reverse() -> [1, 0, 1, 0]
                    // implode() -> "1-0-1-0"
                    $resultado_final = implode('-', array_reverse($digitos));

                    // 3. MOSTRAR RESULTADO (HTML)
                    // Usamos un 'card-footer' de Bootstrap para mostrar el resultado formateado
                    echo '<div class="card-footer bg-light p-3">';
                    echo "<h5 class='mb-0'>Resultado:</h5>";
                    // Mostramos el resultado de forma clara
                    echo "<p class='mb-0'>El número <strong>$numero_original</strong> (base 10) es <strong>$resultado_final</strong> (base $base).</p>";
                    echo '</div>';
                }
                // 3. MOSTRAR ERRORES (HTML)
                else {
                    // Si $error_msg SÍ tiene contenido, mostramos el error en un footer rojo
                    echo '<div class="card-footer bg-danger text-white p-3">';
                    echo "<h5 class='mb-0'>Error de Validación:</h5>";
                    echo "<p class='mb-0'>$error_msg</p>";
                    echo '</div>';
                }
            }
            // --- FIN DEL BLOQUE PHP ---
            ?>

        </div>
    </div>
</body>

</html>