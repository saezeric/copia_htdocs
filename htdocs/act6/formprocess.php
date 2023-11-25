<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $valor1 = $_POST["m1"];
    $valor2 = $_POST["m2"];
    $valor3 = $_POST["m3"];
    $valor4 = $_POST["m4"];
    $valor5 = $_POST["m5"];
}
?>

<html>
 <head>
  <title>Detalles formprocess</title>
 </head>
 <body>
    <select name="options">
        <option value="predeterminado">Selecciona una opción: </option>
        <option value="<?php echo $valor1 ?>"><?php echo $valor1 ?></option>
        <option value="<?php echo $valor2 ?>"><?php echo $valor2 ?></option>
        <option value="<?php echo $valor3 ?>"><?php echo $valor3 ?></option>
        <option value="<?php echo $valor4 ?>"><?php echo $valor4 ?></option>
        <option value="<?php echo $valor5 ?>"><?php echo $valor5 ?></option>
    </select>
 </body>
</html>