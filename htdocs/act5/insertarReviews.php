<?php
$db = mysqli_connect('localhost', 'root', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

$query = "INSERT INTO reviews (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
	VALUES
    	(4, '2022-01-15', 'Alice Johnson', '¡Una película asombrosa, definitivamente la mejor del año!', 5),
    	(5, '2022-05-20', 'David Williams', 'La película me dejó sin palabras, una obra maestra.', 5),
    	(6, '2023-03-10', 'Sophia Martinez', 'Esperaba más, pero aún fue entretenida.', 3);";

mysqli_query($db,$query) or die (mysqli_error($db));

try {
  echo "<p>Se añadió correctamente el contenido</p>";
} catch (Exception $e) {
  echo "<p>Error al añadir contenido: " . $e->getMessage() . "</p>";
}

mysqli_close($db);
?>