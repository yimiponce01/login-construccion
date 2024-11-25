<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaingresarusuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $tmpdatusuario = $_POST["datusuario"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];

    $modelousuario = new modelousuario();

    try{
    $modelousuario->insertarUsuario($tmpdatusuario,$tmpdatpassword,$tmpdatperfil);
    $mensaje= "usuario registrado con exito";
    }catch(PDOException $e){
        echo "hubo un error ...<br>".$e->getMessage();
    }
    exit(); //corta la ejecucion
}

mostrarFormularioIngreso($mensaje);