<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
    mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'users':
        echo 'Are you sure you want to delete this movie?<br/>';
        break;
    case 'poems':
        echo 'Are you sure you want to delete this person?<br/>';
        break;
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> '; 
    echo 'or <a href="select.php">no</a>';
} else {
    switch ($_GET['type']) {
    case 'users':
        $query = 'DELETE FROM poems 
            WHERE
                user_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $query = 'DELETE FROM users 
        WHERE
            user_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Your user has been deleted succesfully!
<a href="select.php">Return to Index</a></p>
<?php
        break;
    case 'poems':
        $query = 'DELETE FROM poems 
            WHERE
                poem_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
 
?>
<p style="text-align: center;">Your user has been deleted succesfully!
<a href="select.php">Return to Index</a></p>
<?php
        break;
    }
}
?>
