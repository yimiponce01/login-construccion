


<?php

include $_SERVER['DOCUMENT_ROOT'] . '/views/vistanotificacion.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';


if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit;
}


$opcion = $_GET["opcion"] ?? "ver";
        switch ($opcion) {
            case 'ver':
                ob_start();
                include  get_controllers_disk("controladorusuario.php");
                $contenido = ob_get_clean();
                break;
            case 'ingresar':
                ob_start();
                include  get_controllers_disk("controladoringresarusuario.php");
                $contenido = ob_get_clean();
                break;
            case 'modificar':
                ob_start();
                include  get_controllers_disk("controladoractualizarusuario.php");
                $contenido = ob_get_clean();
                break;
            case 'eliminar':
                ob_start();
                include  get_controllers_disk("controladoreliminarusuario.php");
                $contenido = ob_get_clean();
                break;
            default:
                return null;
        }



include get_views_disk('vistadashboard.php');

//require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistadashboard.php';