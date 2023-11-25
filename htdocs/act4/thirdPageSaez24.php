<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

$query = "SELECT movie.movie_name AS movie_title, 
                 people.people_fullname AS director, 
                 lead_actor.people_fullname AS lead_actor
          FROM movie
          INNER JOIN people ON movie.movie_director = people.people_id
          INNER JOIN people AS lead_actor ON movie.movie_leadactor = lead_actor.people_id";

$result = mysqli_query($db, $query);

if (!$result) {
    die("Error: " . mysqli_error($db));
}

echo "<table>";
echo "<tr><th>Título peli</th><th>Director</th><th>Actor Principal</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['movie_title'] . "</td>";
    echo "<td>" . $row['director'] . "</td>";
    echo "<td>" . $row['lead_actor'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($db);

?>