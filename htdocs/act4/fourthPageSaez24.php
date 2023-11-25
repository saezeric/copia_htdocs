<?php
$db = mysqli_connect('localhost', 'root', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

$itemsPorPagina = 10;

$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$inicio = ($paginaActual - 1) * $itemsPorPagina;

$query = "SELECT movie.movie_name AS movie_title, 
                 people.people_fullname AS director, 
                 lead_actor.people_fullname AS lead_actor
          FROM movie
          INNER JOIN people ON movie.movie_director = people.people_id
          INNER JOIN people AS lead_actor ON movie.movie_leadactor = lead_actor.people_id
          LIMIT $inicio, $itemsPorPagina";

$result = mysqli_query($db, $query);

if (!$result) {
    die("La consulta SQL falló: " . mysqli_error($db));
}

echo "<table>";
echo "<tr><th>Título de la película</th><th>Director</th><th>Actor Principal</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['movie_title'] . "</td>";
    echo "<td>" . $row['director'] . "</td>";
    echo "<td>" . $row['lead_actor'] . "</td>";
    echo "</tr>";
}

echo "</table>";

$totalElementos = mysqli_num_rows(mysqli_query($db, "SELECT * FROM movie"));

$totalPaginas = ceil($totalElementos / $itemsPorPagina);

echo "<div class='pagination'>";
for ($i = 1; $i <= $totalPaginas; $i++) {
    	echo "<a href='mainPageSaez24.php?pagina=$i'>Page 1 </a></br>";
	echo "<a href='secPageSaez24.php?pagina=$i'>Page 2 </a></br>";
	echo "<a href='thirdPageSaez24.php?pagina=$i'>Page 3</a></br>";
}
echo "</div>";

mysqli_close($db);
?>