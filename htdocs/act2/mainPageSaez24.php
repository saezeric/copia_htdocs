<?php
session_unset();

setcookie("aficion","deporte",time()+60);
setcookie("deporte","furbo",time()+60);

$vuelta = $_GET['volver'];

?>
<html>
 <head>
  <title>Please Log In</title>
 </head>
 <body>
  <form method="post" action="secPageSaez24.php">
   <p>Enter your username: 
    <input type="text" name="user"/>
   </p>
   <p>Enter your email: 
    <input type="text" name="mail"/>
   </p>
   <p>Enter your password: 
    <input type="password" name="pass"/>
   </p>
   <p>
    <input type="submit" name="submit" value="Submit"/>
   </p>
  </form>
 </body>
</html>

<?php

echo $vuelta;
echo "<br/>";

$anonimoLink = urlencode("Has entrado como anonimo!!! Logueate para mostrar tu info de perfil");
echo "<a href='secPageSaez24.php?anonimo=$anonimoLink'>";
echo "Entra como anonimo a la web"; 
echo "</a>";

?>