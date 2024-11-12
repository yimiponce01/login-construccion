<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page

if (isset($_SESSION["favcolor"])) {
  echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
  echo "Favorite animal is " . $_SESSION["favanimal"] . ".";

} else{
    echo"No existe variables";
    echo"<br>";

}
?>

<br>
PAGINA DE VER VARIABLES
<br>


<a href="http://127.0.0.1/login-construccion/vervariables.php">actualizar variable</a>
<a href="http://127.0.0.1/login-construccion/borrarvariables.php">limpia la variable</a>

</body>
</html>