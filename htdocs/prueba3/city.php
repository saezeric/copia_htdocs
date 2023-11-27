<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            city, country_id, last_update
        FROM
            city
        WHERE
            city_id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));

    // Convierto la fecha a tiempo unix y lo paso a formato fecha para mostrarlo
} else {
    //set values to blank
    $city = '';
    $country_id = 0;
    $last_update = date("Y-m-d H:m:s");
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> City</title>
  <style>

    #error { 
    background-color: #600;
    border: 1px solid #FF0; 
    color: #FFF;
    text-align: center; 
    margin: 10px; 
    padding: 10px; 
    }

  </style>
 </head>
 <body>
<?php
if (isset($_GET['error']) && $_GET['error'] != '') {
    echo '<div id="error">' . $_GET['error'] . '</div>';
}
?>
  <form novalidate action="commit.php?action=<?php echo $_GET['action']; ?>&type=city"
   method="post">
   <table>
    <tr>
     <td>City: </td>
     <td><input type="text" name="city"
      value="<?php echo $city; ?>"/></td>
    </tr><tr>
    <td>Country: </td>
     <td><select name="country_id" id="country_id">
<?php

$query = 'SELECT
        country_id, country
    FROM
        country
    ORDER BY
        country';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// populate the select options with the results
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['country_id'] == $country_id) {
        echo '<option value="' . $row['country_id'] .
            '" selected="selected">';
    } else {
        echo '<option value="' . $row['country_id'] . '">';
    }
    echo $row['country'] . '</option>';
}

?>
     </select></td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="city_id" />';
}
?>
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>