


<?php

include $_SERVER['DOCUMENT_ROOT'] . '/views/vistanotificacion.php';


session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';


if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit;
}

class Controladordashboard
{
    public static function handleRequest($opcion)
    {
        switch ($opcion) {
            case 'ver':
                return get_controllers("controladorusuario.php");
            case 'ingresar':
                return get_controllers("controladoringresarusuario.php");
            case 'modificar':
                return get_controllers("controladoractualizarusuario.php");
            case 'eliminar':
                return get_controllers("controladoreliminarusuario.php");
            default:
                return null;
        }
    }
}

// Obtener la opción seleccionada y la URL del iframe
$iframeSrc = null;
if (isset($_GET["opcion"])) {
    $iframeSrc = Controladordashboard::handleRequest($_GET["opcion"]);
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistadashboard.php';