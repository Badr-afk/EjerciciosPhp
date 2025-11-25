<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secuencia Fibonacci</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Secuencia Fibonacci</h4>
                        <small>Mostrar Secuencia</small>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" class="row g-3">
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-success w-100 btn-lg">
                                    Mostrar secuencia
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                $contador = 0;
                $num1 = 0;
                $num2 = 1;
                $resultado = [];

                // Generamos la secuencia
                while ($contador < 16) {
                    $siguiente = $num1 + $num2;
                    $resultado[] = $siguiente;
                    $num1 = $num2;
                    $num2 = $siguiente;
                    $contador++;
                }

                $mensaje = '<ul class="list-group mt-3">';

                foreach ($resultado as $numero) {

                    // --- LÓGICA PARA SABER SI ES PRIMO ---
                    $es_primo = true; // Asumimos que es primo al empezar

                    if ($numero < 2) {
                        $es_primo = false; // El 0 y el 1 no son primos
                    } else {
                        // Probamos a dividir desde el 2 hasta la raíz cuadrada del número
                        for ($i = 2; $i <= sqrt($numero); $i++) {
                            if ($numero % $i == 0) {
                                $es_primo = false; // Encontramos un divisor, ya no es primo
                                break; // Salimos del bucle, no hace falta seguir probando
                            }
                        }
                    }
                    // -------------------------------------

                    // Preparamos el texto extra si es primo
                    $etiqueta_primo = '';
                    if ($es_primo) {
                        $etiqueta_primo = ' <span class="badge bg-warning text-dark">¡ES PRIMO!</span>';
                    }

                    // Mostramos Par/Impar y añadimos la etiqueta de primo
                    if ($numero % 2 == 0) {
                        $mensaje .= '<li class="list-group-item list-group-item-primary">El numero: ' . $numero . ' es PAR' . $etiqueta_primo . '</li>';
                    } else {
                        $mensaje .= '<li class="list-group-item list-group-item-light">El numero: ' . $numero . ' es IMPAR' . $etiqueta_primo . '</li>';
                    }
                }

                $mensaje .= '</ul>';

                echo $mensaje;
                ?>
</body>

</html>