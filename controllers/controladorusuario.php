<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistausuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}


$modelousuario = new modelousuario();

$usuarios = $modelousuario->obtenerUsuarios();

mostrarUsuarios($usuarios);