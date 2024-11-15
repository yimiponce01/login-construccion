<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>
se borraron todas las variables
<br>

<a href="http://127.0.0.1/login-construccion/vervariables.php">ver variables</a>
<a href="http://127.0.0.1/login-construccion/test.php">volver a grabar las variables</a>
</body>
</html>