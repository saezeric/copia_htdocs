<html>
<head>
    <title>Calculadora PHP - Saez Eric</title>
</head>
<body>
    <form action="" method="post">
        <label for="n1">Número 1:</label>
        <input type="text" name="n1">
        <br>
        <label for="n2">Número 2:</label>
        <input type="text" name="n2">
        <br>
        <label for="n3">Número 3:</label>
        <input type="text" name="n3">
        <br>
        <label for="calcular">Operación: </label>
        <select name="calcular">
            <option value="">Selecciona una opcion: </option>
            <option value="sumar">Sumar</option>
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select>

        <input type="submit" value="operaciones">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n1 = $_POST["n1"];
            $n2 = $_POST["n2"];
            $n3 = $_POST["n3"];
            $options = $_POST["calcular"];
            
        if (is_numeric($n1) && is_numeric($n2) && is_numeric($n3)) {
            $resultado = 0;

            if ($options === "sumar") {
                $resultado = $n1 + $n2 + $n3;
                echo "Suma: $resultado";
            } elseif ($options === "restar") {
                $resultado = $n1 - $n2 - $n3;
                echo "Resta: $resultado";
            } elseif ($options === "multiplicar") {
                $resultado = $n1 * $n2 * $n3;
                echo "Multiplicacion: $resultado";
            } elseif ($options === "dividir") {
                if ($n2 != 0 && $n3 != 0) {
                    $resultado = $n1 / $n2 * $n3;
                echo "Division: $resultado";
                } else {
                    echo "No podemos dividir por 0";
                }
            } else {
                echo "Invalid Operation";
            }
        } else {
            echo "Pls, insert valid numbers";
        }
    }
    ?>
</body>
</html>