<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaactualizarusuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $modelousuario = new modelousuario();
    if (isset($_POST['custId'])) { //envio desde el formualrio editar
        $tmpcustID = $_POST["custId"];
        $tmpdatusuario = $_POST["datusuario"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];
        $modelousuario->actualizarusuarios($tmpcustID, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
        $mensaje = "Actualización con éxito...";
        mostrarformulariobusqueda($mensaje);



    } else {
        $tmpdatusuario = $_POST["datusuario"];
        $usuario = $modelousuario->obtenerusuariopornombre($tmpdatusuario);
        if ($usuario) {
            mostrarformularioedicion($usuario);
        } else {
            mostrarformulariobusqueda("usuario no encontrado ...");
        }
    }
} else {
    mostrarformulariobusqueda();
}
