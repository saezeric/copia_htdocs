<?php
session_start();

$fuente = "Arial";
$tamaño = "15px";
$texto = "";
$color = "";

if (isset($_POST['save']) && $_POST['save'] === "yes") {
    $miCookie = "userPreferences";
    $valorCookie = json_encode([
        'color' => $color,
        'font' => $fuente,
        'size' => $tamaño,
        'text' => $texto
    ]);
    setcookie($miCookie, $valorCookie, time() + (30 * 24 * 60 * 60), "/");
}

if (isset($_POST['guardar'])) {
    $color = $_POST['color'];
    $fuente = $_POST['fuente'];

    if (isset($_POST['texto'])) {
        $texto = $_POST['texto']; // Capturar el contenido del campo de texto
    }
    if (isset($_POST['tamaño'])) {
        $tamaño = $_POST['tamaño'] . 'px'; // Capturar el tamaño del texto y agregar 'px'
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            color: <?php echo $color; ?>;
            font-family: <?php echo $fuente; ?>;
            font-size: <?php echo $tamaño; ?>;
        }
    </style>
</head>
<body>
    <p><?php echo $texto; ?></p>
    
    <footer style="text-align: center;">

        <a href="https://github.com/saezeric/trabajosEgea">Site developed by: Eric Saez Escalona</a>
    </footer>
</body>
</html>