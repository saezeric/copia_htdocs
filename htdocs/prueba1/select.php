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
   <th colspan="2">Users <a href="users.php?action=add">[ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM users';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width:75%;">'; 
    echo $row['first_name'];
    echo '</td><td>';
    echo $row['last_name'];
    echo '</td><td>';
    echo $row['email'];
    echo '</td><td>';
    echo $row['username'];
    echo '</td><td>';
    echo ' <a href="edit.php?action=edit&id=' . $row['user_id'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=users&id=' . $row['user_id'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  <tr>
    <th colspan="2">Poems <a href="poems.php?action=add"> [ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM poems';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width: 25%;">'; 
    echo $row['title'];
    echo '</td><td>';
    echo $row['poem'];
    echo '</td><td>';
    echo ' <a href="edit.php?action=edit&id=' . $row['poem_id'] .
        '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=poem&id=' . $row['poem_id'] .
        '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  </table>
 </body>
</html>
