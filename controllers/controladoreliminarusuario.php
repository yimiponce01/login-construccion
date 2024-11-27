<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaeliminarusuario.php';


if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];

    $mensaje='';
    if ($tmpdatusuario){    
    $modelousuario = new modelousuario();
    try{
        $modelousuario->eliminarusuariopornombre($tmpdatusuario);
        $mensaje= "usuario eliminado con exito";
        
        }catch(PDOException $e){
            $mensaje= "hubo un error ...<br>".$e->getMessage();
        }
    }
    mostrarformularioeliminar($mensaje);

}else {
    mostrarformularioeliminar();
}

?>