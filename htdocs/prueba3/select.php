<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Tables</title>
  <style type="text/css">
   th { background-color: #999;}
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
 <table style="width:100%;">
  <tr>
   <th colspan="2">Country <a href="country.php?action=add">[ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM country';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width:75%;padding:10px">';
    echo $row['country'];
    echo '</td><td>';
    echo ' <a href="country.php?action=edit&id=' . $row['country_id'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=country&id=' . $row['country_id'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  <tr>
    <th colspan="2">City <a href="city.php?action=add"> [ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM city';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width: 25%;padding:10px">'; 
    echo $row['city'];
    echo '</td><td>';
    echo ' <a href="city.php?action=edit&id=' . $row['city_id'] .
        '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=city&id=' . $row['city_id'] .
        '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>

  <tr>
    <th colspan="2">Address <a href="address1.php?action=add"> [ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM address1';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width: 25%;padding:10px">'; 
    echo $row['address1'];
    echo '</td><td>';
    echo ' <a href="address1.php?action=edit&id=' . $row['address_id'] .
        '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=address&id=' . $row['address_id'] .
        '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  </table>
 </body>
</html>