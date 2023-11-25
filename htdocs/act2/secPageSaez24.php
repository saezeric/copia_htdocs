<?php
session_start();

$_SESSION['username'] = $_POST['user'];
$_SESSION['email'] = $_POST['mail'];
$_SESSION['userpass'] = $_POST['pass'];
$_SESSION['authuser'] = 1;

echo $_COOKIE["aficion"];
echo "<br/>";
echo $_COOKIE["deporte"];
echo "<br/>";
$fechaActual = date("d-m-Y");
echo $fechaActual;
echo "<br/>";
echo "<br/>";

$vueltaAtras = urlencode("Puedes loguearte de nuevo!!");
?>

<html>
 <head>
  <title>Furbo y jugadores</title>
 </head>
 <body>
<?php
echo "Bienvenido a la pagina, ";
echo $_SESSION["username"];
echo "! <br/>";
echo "Tu mail es: ";
echo $_SESSION["email"];
echo "<br/>";

echo "<br/>";
echo "<a href='mainPageSaez24.php?volver=$vueltaAtras'>";
echo "Clica aquí para volver!!!"; 
echo "</a>";
echo "<br/>";

$anonimoGet = $_GET['anonimo'] ?? 'Te has logueado';
echo $anonimoGet;

?>
 </body>
</html>