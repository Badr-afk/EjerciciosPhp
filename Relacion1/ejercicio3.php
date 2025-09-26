<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <ul>
        <h2>Super Globals</h2>
        <?php
        $claves = [
            'DOCUMENT_ROOT',
            'PHP_SELF',
            'SERVER_NAME',
            'SERVER_SOFTWARE',
            'SERVER_PROTOCOL',
            'HTTP_HOST',
            'HTTP_USER_AGENT',
            'REMOTE_ADDR',
            'REMOTE_PORT',
            'SCRIPT_FILENAME',
            'REQUEST_URI'
        ];
        foreach ($claves as $clave) {
            $valor = isset($_SERVER[$clave]) ? $_SERVER[$clave] : 'No definido';
            echo "<li><strong>$clave:</strong> $valor</li>";
        }
        ?>
    </ul>
</body>
</html>