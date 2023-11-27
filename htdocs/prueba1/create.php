<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

$query = 'CREATE TABLE users (
    user_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name varchar(50),
    last_name varchar(50),
    email varchar(100),
    username varchar(30),
    pass_phrase varchar(500),
    is_admin tinyint(4),
    date_registered datetime,
    profile_pic varchar(30),
    registration_confirmed tinyint(4)
);';

$result = mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'CREATE TABLE poems (
    poem_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title varchar(200),
    poem text,
    date_submitted datetime,
    user_id int(11),
    date_approved datetime,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);';

$result = mysqli_query($db, $query) or die(mysqli_error($db));
?>

<html>
<body>
    <p>done!</p>
</body>
</html>
