<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            title, poem, date_submitted, user_id, date_approved
        FROM
            poems
        WHERE
            poem_id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));

} else {
    //set values to blank
    $title = '';
    $poem = '';
    $date_submitted = date("Y-m-d H:m:s");
    $user_id = 0;
    $date_approved = date("Y-m-d H:m:s");

}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> poems</title>
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
  <form novalidate action="commit.php?action=<?php echo $_GET['action']; ?>&type=poems"
   method="post">
   <table>
    <tr>
     <td>Titulo: </td>
     <td><input type="text" name="title"
      value="<?php echo $title; ?>"/></td>
    </tr><tr>
    <td>Poema: </td>
     <td><input type="text" name="poem" value="<?php echo $poem; ?>"/>
    </td>
    </tr><tr>
    <td>Fecha de registro: </td>
     <td><input type="datetime-local" name="date_submitted"
     value="<?php echo $date_submitted; ?>"/></td>
    </tr><tr>
    <td>Username: </td>
     <td><select name="user_id" id="user_id">
<?php

$query = 'SELECT
        user_id, username
    FROM
        users
    ORDER BY
        username';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// populate the select options with the results
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['user_id'] == $user_id) {
        echo '<option value="' . $row['user_id'] .
            '" selected="selected">';
    } else {
        echo '<option value="' . $row['user_id'] . '">';
    }
    echo $row['username'] . '</option>';
}

?>
     </select></td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="poem_id" />';
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
