<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            address1, address2, district, city_id, postal_code, phone, last_update
        FROM
            address1
        WHERE
            address_id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));

    // Convierto la fecha a tiempo unix y lo paso a formato fecha para mostrarlo
} else {
    //set values to blank
    $address1 = '';
    $address2 = '';
    $district = '';
    $city_id = 0;
    $postal_code = '';
    $phone = '';
    $last_update = date("Y-m-d H:m:s");
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Address</title>
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
  <form novalidate action="commit.php?action=<?php echo $_GET['action']; ?>&type=address"
   method="post">
   <table>
    <tr>
     <td>Address 1: </td>
     <td><input type="text" name="address1"
      value="<?php echo $address1; ?>"/></td>
    </tr><tr>
     <td>Address 2: </td>
     <td><input type="text" name="address2"
      value="<?php echo $address2; ?>"/></td>
    </tr><tr>
    </tr><tr>
     <td>District: </td>
     <td><input type="text" name="district"
      value="<?php echo $district; ?>"/></td>
    </tr><tr>
    <td>City: </td>
     <td><select name="city_id" id="city_id">
<?php

$query = 'SELECT
        city_id, city
    FROM
        city
    ORDER BY
        city';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// populate the select options with the results
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['city_id'] == $city_id) {
        echo '<option value="' . $row['city_id'] .
            '" selected="selected">';
    } else {
        echo '<option value="' . $row['city_id'] . '">';
    }
    echo $row['city'] . '</option>';
}

?>
     </select></td>
    </tr><tr>
     <td>Postal Code: </td>
     <td><input type="text" name="postal_code"
      value="<?php echo $postal_code; ?>"/></td>
    </tr><tr>
     <td>Phone: </td>
     <td><input type="text" name="phone"
      value="<?php echo $phone; ?>"/></td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="address_id" />';
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