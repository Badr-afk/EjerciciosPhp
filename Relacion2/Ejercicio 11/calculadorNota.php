<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador</title>
</head>
<body>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota1 = $_GET['nota1'];
    $nota2 = $_GET['nota2'];
    $fallos= $_GET['fallos'];

    if (is_numeric($nota1) && is_numeric($nota2)) {
        $media = ($nota1 + $nota2) / 2;
        header("Location: index.php?resultado=" . round($media, 2));
        exit();
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}
?>
</body>
</html>