<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/etc/config.php';
// Redirige al controlador de login
header('Location: '.get_controllers('controladorlogin.php'));
exit;

?>