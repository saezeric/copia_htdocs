<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            first_name, last_name, email, username, pass_phrase, is_admin, date_registered, profile_pic
        FROM
            users
        WHERE
            user_id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));

    // Convierto la fecha a tiempo unix y lo paso a formato fecha para mostrarlo
} else {
    //set values to blank
    $first_name = '';
    $last_name = '';
    $email = '';
    $username = '';
    $pass_phrase = '';
    $is_admin = 0;
    $date_registered = date("Y-m-d H:m:s");
    $profile_pic = '';

}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Users</title>
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
  <form novalidate action="commit.php?action=<?php echo $_GET['action']; ?>&type=users"
   method="post">
   <table>
    <tr>
     <td>Nombre: </td>
     <td><input type="text" name="first_name"
      value="<?php echo $first_name; ?>"/></td>
    </tr><tr>
    <td>Apellidos: </td>
     <td><input type="text" name="last_name"
      value="<?php echo $last_name; ?>"/></td>
    </tr><tr>
    <td>Username: </td>
     <td><input type="text" name="username"
     value="<?php echo $username; ?>"/></td>
    </tr><tr>
    <td>Email: </td>
     <td><input type="email" name="email"
     value="<?php echo $email; ?>"/></td>
    </tr><tr>
    <td>Password: </td>
     <td><input type="password" name="pass_phrase"
      value="<?php echo $pass_phrase; ?>"/></td>
    </tr><tr>
     <td>Es Administrador?</td>
     <td>
     <label>
        <input type="checkbox" id="is_admin" name="is_admin" value="1" <?php echo ($is_admin == 1) ? 'checked' : ''; ?>/>
      </label>
     </td>
    </tr><tr>
     <td>Fecha de registro: </td>
     <td><input type="datetime-local" name="date_registered"
      value="<?php echo $date_registered; ?>"/></td>
    </tr><tr>
     <td>Foto de perfil: </td>
     <td><input type="url" name="profile_pic"
      value="<?php echo $profile_pic; ?>"/></td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="user_id" />';
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
