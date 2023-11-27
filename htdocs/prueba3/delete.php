<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
    mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'country':
        echo 'Are you sure you want to delete this country?<br/>';
        break;
    case 'city':
        echo 'Are you sure you want to delete this city?<br/>';
        break;
    case 'address':
        echo 'Are you sure you want to delete this address?<br/>';
        break;
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> '; 
    echo 'or <a href="select.php">no</a>';
} else {
    switch ($_GET['type']) {
    case 'country':

        $query = 'SELECT city_id from city where country_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        while ($row = mysqli_fetch_assoc($result)){
            $query = 'DELETE FROM address1 
                WHERE
                    city_id = ' . $row['city_id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
        }

        $query = 'DELETE FROM city
            WHERE
                country_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $query = 'DELETE FROM country 
        WHERE
            country_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

?>
<p style="text-align: center;">Your country has been deleted succesfully!
<a href="select.php">Return to Index</a></p>
<?php
        break;
    case 'city':

        $query = 'DELETE FROM address1 
            WHERE
                address_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $query = 'DELETE FROM city 
            WHERE
                city_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
 
?>
<p style="text-align: center;">Your city has been deleted succesfully!
<a href="select.php">Return to Index</a></p>
<?php
        break;
    case 'address':

        $query = 'DELETE FROM address1 
            WHERE
                address_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
    
?>
<p style="text-align: center;">Your address has been deleted succesfully!
<a href="select.php">Return to Index</a></p>
<?php
        break;
    }
}
?>