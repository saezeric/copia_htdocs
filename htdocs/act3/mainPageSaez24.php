<?php
session_start();

echo "Hace 2 dias era ";
$dosDias = date("d-m-Y", strtotime("-2 days"));
echo $dosDias;
echo "</br>";

echo "El siguiente mes es ";
$unMes = date("d-m-Y", strtotime("+1 month"));
echo $unMes;
echo "</br>";

echo "Quedan ";
$diaHoy = date("j");
$ultimoDia = date("t");
$diasRestantes = $ultimoDia - $diaHoy;
echo $diasRestantes;
echo " dias este mes";
echo "</br>";

echo "Quedan ";
$mesHoy = date("n");
$mesesRestantes = 12 - $mesHoy;
echo $mesesRestantes;
echo " meses en este año";
echo "</br>";
echo "</br>";

if (isset($_SESSION['page_views'])){
    $_SESSION['page_views']++;
} else {
    $_SESSION['page_views'] = 1;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
</head>
<body>
    <p>Esta página ha sido visitada <?php echo $_SESSION['page_views']; ?></p>

<?php
$esteMes = date("n");

if($esteMes >= 6 && $esteMes <= 8){
echo "Feliz verano!";
}elseif($esteMes >= 9 && $esteMes <= 11){
echo "Feliz otoño!";
}elseif($esteMes >= 12 && $esteMes <= 2){
echo "Feliz invierno!";
}else{
echo "Feliz día! :)";
}

?>

<form action="secPageSaez24.php" method="post">
        <label for="color">Color del texto:</label>
        <input type="color" id="color" name="color"><br>

        <label for="fuente">Fuente de texto:</label>
        <select id="fuente" name="fuente">
            <option value="Arial">Arial</option>
            <option value="Times New Roman">Times New Roman</option>
        </select><br>

        <label for="tamaño">Tamaño del texto:</label>
        <input type="number" id="tamaño" name="tamaño" min="11" max="50" step="1"><br>

        <label for="texto">Texto:</label><br>
        <textarea id="texto" name="texto" rows="1" cols="40"></textarea><br>

        <label for="savePrefs">¿Guardar preferencias?</label>
        <input type="checkbox" id="savePrefs" name="savePrefs" value="yes"><br>s

        <input type="submit" name="guardar" value="Formatear Texto">
    </form>

<footer style="text-align: center;">
    <a href="https://github.com/saezeric/trabajosEgea">Sitio desarrollado por: Eric Saez Escalona</a>
</footer>
</body>
</html>