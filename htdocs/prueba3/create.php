<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

$query = 'CREATE TABLE country (
    country_id smallint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    country varchar(50),
    last_update timestamp
);';

$result = mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'CREATE TABLE city (
    city_id smallint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    city varchar(50),
    country_id smallint,
    last_update timestamp,
    FOREIGN KEY (country_id) REFERENCES country (country_id)
);';

$result = mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'CREATE TABLE address1 (
    address_id smallint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    address1 varchar(50),
    address2 varchar(50),
    district varchar(20),
    city_id smallint,
    postal_code varchar(10),
    phone varchar(20),
    locations geometry,
    last_update timestamp,
    FOREIGN KEY (city_id) REFERENCES city (city_id)
);';

$result = mysqli_query($db, $query) or die(mysqli_error($db));
?>

<html>
<body>
    <p>done!</p>
</body>
</html>