<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));


switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'users':
        $error = array();

        $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
        if (empty($first_name)) {
            $error[] = urlencode('Please enter your name');
        }
        if (strlen($first_name) > 50){
            $error[] = urlencode('Your name is to long');
        }

        $last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
        if (empty($last_name)) {
            $error[] = urlencode('Please enter your last name');
        }

        if (strlen($last_name) > 50){
            $error[] = urlencode('Your last name is to long');
        }

        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        if (empty($email)) {
            $error[] = urlencode('Please enter your email');
        }
        if (strlen($email) > 100){
            $error[] = urlencode('Your email is to long');
        }

        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        if (empty($username)) {
            $error[] = urlencode('Please enter your username');
        }
        if (strlen($username) > 30){
            $error[] = urlencode('Your username is to long');
        }

        $pass_phrase = isset($_POST['pass_phrase']) ? trim($_POST['pass_phrase']) : '';
        if (empty($pass_phrase)) {
            $error[] = urlencode('Please enter your Password');
        }
        if (strlen($pass_phrase) > 500){
            $error[] = urlencode('Your password is to long');
        }

        $is_admin = isset($_POST['is_admin']) ? trim($_POST['is_admin']) : '';
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;

        $date_registered = isset($_POST['date_registered']) ? trim($_POST['date_registered']) : '';
        $date_registered = isset($_POST['date_registered']) ? $_POST['date_registered'] : date("Y-m-d H:m:s");
        if (empty($date_registered) || !strtotime($date_registered)) {
            $error[] = urlencode('Please enter a valid date');
        } else {
            // Convierte la fecha al formato deseado (Y-m-d H:i:s)
            $date_registered = date("Y-m-d H:i:s", strtotime($date_registered));
        }

        $profile_pic = isset($_POST['profile_pic']) ? trim($_POST['profile_pic']) : '';
        if (empty($profile_pic)) {
            $error[] = urlencode('Please enter a profile pic');
        }
        if (strlen($profile_pic) > 30){
            $error[] = urlencode('Your profile pic link is to long');
        }

        $registration_confirmed = isset($_POST['registration_confirmed']) ? 1 : 0;
        if (strlen($registration_confirmed) > 4){
            $error[] = urlencode('Registration value is to long');
        } 
        

        if (empty($error)) {
            $registration_confirmed = 1;

            $query = 'INSERT INTO
                users
                    (first_name, last_name, email, username, pass_phrase, is_admin, date_registered, profile_pic, registration_confirmed)
                VALUES
                    ("' . $first_name . '",
                     "' . $last_name . '",
                     "' . $email . '",
                     "' . $username . '",
                     "' . $pass_phrase . '",
                     ' . $is_admin . ',
                     "' . $date_registered . '",
                     "' . $profile_pic . '",
                     ' . $registration_confirmed .')';
        } else {
          
          if(!is_array($error)) {
            $error = [$error];
          }
          $errorString = join('<br/>', array_map('urlencode', $error));
          header('Location:users.php?action=add' . '&error=' . $errorString);
        }
        break;
    
    case 'poems':
        $error = array();

        $title = isset($_POST['title']) ? trim($_POST['title']) : '';
        if (empty($title)) {
            $error[] = urlencode('Please enter a Title');
        }
        if (strlen($title) > 200){
            $error[] = urlencode('Your title is to long');
        }

        $poem = isset($_POST['poem']) ? trim($_POST['poem']) : '';
        if (empty($poem)) {
            $error[] = urlencode('Please write a Poem');
        }

        $date_submitted = isset($_POST['date_submitted']) ? trim($_POST['date_submitted']) : '';
        $date_submitted = isset($_POST['date_submitted']) ? $_POST['date_submitted'] : date("Y-m-d H:m:s");
        if (empty($date_submitted) || !strtotime($date_submitted)) {
            $error[] = urlencode('Please enter a valid date');
        } else {
            // Convierte la fecha al formato deseado (Y-m-d H:i:s)
            $date_submitted = date("Y-m-d H:i:s", strtotime($date_submitted));
            $date_approved = date("Y-m-d H:i:s", strtotime('+1 hour', strtotime($date_submitted)));
        }

        $user_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';
        if (empty($user_id)) {
            $error[] = urlencode('Please select a User');
        }
        if (strlen($user_id) > 11){
            $error[] = urlencode('Your User Id is to long');
        }

        if (empty($error)) {
            $query = 'INSERT INTO
                poems
                    (title, poem, date_submitted, user_id, date_approved)
                VALUES
                    ("' . $title . '",
                     "' . $poem . '",
                     "' . $date_submitted . '",
                     ' . $user_id . ',
                     "' . $date_approved . '")';
        } else {
          
          if(!is_array($error)) {
            $error = [$error];
          }
          $errorString = join('<br/>', array_map('urlencode', $error));
          header('Location:poems.php?action=add' . '&error=' . $errorString);
        }
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'users':
        $error = array();
        
        $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
        if (empty($first_name)) {
            $error[] = urlencode('Please enter your name');
        }
        if (strlen($first_name) > 50){
            $error[] = urlencode('Your name is to long');
        }

        $last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
        if (empty($last_name)) {
            $error[] = urlencode('Please enter your last name');
        }

        if (strlen($last_name) > 50){
            $error[] = urlencode('Your last name is to long');
        }

        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        if (empty($email)) {
            $error[] = urlencode('Please enter your email');
        }
        if (strlen($email) > 100){
            $error[] = urlencode('Your email is to long');
        }

        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        if (empty($username)) {
            $error[] = urlencode('Please enter your username');
        }
        if (strlen($username) > 30){
            $error[] = urlencode('Your username is to long');
        }

        $pass_phrase = isset($_POST['pass_phrase']) ? trim($_POST['pass_phrase']) : '';
        if (empty($pass_phrase)) {
            $error[] = urlencode('Please enter your Password');
        }
        if (strlen($pass_phrase) > 500){
            $error[] = urlencode('Your password is to long');
        }

        $is_admin = isset($_POST['is_admin']) ? trim($_POST['is_admin']) : '';
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;

        $date_registered = isset($_POST['date_registered']) ? trim($_POST['date_registered']) : '';
        $date_registered = isset($_POST['date_registered']) ? $_POST['date_registered'] : date("Y-m-d H:m:s");
        if (empty($date_registered) || !strtotime($date_registered)) {
            $error[] = urlencode('Please enter a valid date');
        } else {
            // Convierte la fecha al formato deseado (Y-m-d H:i:s)
            $date_registered = date("Y-m-d H:i:s", strtotime($date_registered));
        }

        $profile_pic = isset($_POST['profile_pic']) ? trim($_POST['profile_pic']) : '';
        if (empty($profile_pic)) {
            $error[] = urlencode('Please enter a profile pic');
        }
        if (strlen($profile_pic) > 30){
            $error[] = urlencode('Your profile pic link is to long');
        }

        $registration_confirmed = isset($_POST['registration_confirmed']) ? 1 : 0;
        if (strlen($registration_confirmed) > 4){
            $error[] = urlencode('Registration value is to long');
        } 

        if (empty($error)) {
            $query = 'UPDATE
                    users
                SET 
                    first_name = "' . $first_name . '",
                    last_name = "' . $last_name . '",
                    email = "' . $email . '",
                    username = "' . $username . '",
                    pass_phrase = "' . $pass_phrase . '",
                    is_admin = ' . $is_admin . ',
                    date_registered = "' . $date_registered . '",
                    profile_pic = "' . $profile_pic . '"
                WHERE
                    user_id = ' . $_POST['user_id'];
        } else {
          if(!is_array($error)) {
              $error = [$error];
            }

          $errorString = join('<br/>', array_map('urlencode', $error));
          header('Location:users.php?action=edit&id=' . $_POST['user_id'] . '&error=' . $errorString);
        }
        break;
    
    case 'poems':
        $error = array();

        $title = isset($_POST['title']) ? trim($_POST['title']) : '';
        if (empty($title)) {
            $error[] = urlencode('Please enter a Title');
        }
        if (strlen($title) > 200){
            $error[] = urlencode('Your title is to long');
        }

        $poem = isset($_POST['poem']) ? trim($_POST['poem']) : '';
        if (empty($poem)) {
            $error[] = urlencode('Please write a Poem');
        }

        $date_submitted = isset($_POST['date_submitted']) ? trim($_POST['date_submitted']) : '';
        $date_submitted = isset($_POST['date_submitted']) ? $_POST['date_submitted'] : date("Y-m-d H:m:s");
        if (empty($date_submitted) || !strtotime($date_submitted)) {
            $error[] = urlencode('Please enter a valid date');
        } else {
            // Convierte la fecha al formato deseado (Y-m-d H:i:s)
            $date_submitted = date("Y-m-d H:i:s", strtotime($date_submitted));
            $date_approved = date("Y-m-d H:i:s", strtotime('+1 hour', strtotime($date_submitted)));
        }

        $user_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';
        if (empty($user_id)) {
            $error[] = urlencode('Please select a User');
        }
        if (strlen($user_id) > 11){
            $error[] = urlencode('Your User Id is to long');
        }

        if (empty($error)) {
            $query = 'UPDATE 
                    poems 
                SET
                    title = "' . $title . '",
                    poem = "' . $poem . '",
                    date_submitted = ' . $date_submitted . ',
                    user_id = ' . $user_id . ',
                    date_approved = ' . $date_approved .'
        WHERE
            poem_id = ' . $_POST['poem_id'];

        } else {
            if (!is_array($error)) {
                $error = [$error];
            }

            $errorString = join('<br/>', array_map('urlencode', $error));
            header('Location: poems.php?action=add' . '&error=' . $errorString);
        }
        break;
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
    <p>Done!</p>
 </body>
</html>