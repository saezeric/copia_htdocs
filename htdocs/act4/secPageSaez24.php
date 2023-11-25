<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

mysqli_select_db($db,'moviesite') or die(mysqli_error($db));


$query = 'INSERT INTO movie
        (movie_id, movie_name, movie_type, movie_year, movie_leadactor,
        movie_director)
    VALUES
        (4, "Mario Bros", 1, 2023, 1, 6),
        (5, "Barbie", 1, 2021, 5, 5),
        (6, "Freeland", 1, 2012, 4, 2)';

mysqli_query($db,$query) or die(mysqli_error($db));

echo 'DATOS INTRODUCIDOS CORRECTAMENTE!!';
?>