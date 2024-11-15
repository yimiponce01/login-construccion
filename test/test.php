<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "las variables ya an sido seleccionadas";
?>

<br>

<a href="http://127.0.0.1/login-construccion/vervariables.php">ir a ver las variables</a>
</body>
</html>