<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

//Creamos la relación
$query = 'ALTER TABLE
        moviesite
    ADD CONSTRAINT
        relMoviePeople
    FOREIGN KEY
        (movie_leadactor)
    REFERENCES
        people_id(id)';

try {
  echo "<p>Se añadió correctamente el contenido</p>";
} catch (Exception $e) {
  echo "<p>Error al añadir contenido: " . $e->getMessage() . "</p>";
}
?>