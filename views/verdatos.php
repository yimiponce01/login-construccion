<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/etc/config.php';
// require_once $_SERVER['DOCUMENT_ROOT']. '/models/conexion.php';

    session_start();


    if (!isset($_SESSION["txtusername"])) {
        header('Location: '.get_UrlBase('index.php'));
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';
    
    $conexion = new conexion($host,$namedb,$userdb,$paswordb);

    $pdo = $conexion->obtenerConexion();

    //$query = $pdo->query("select id,username,password,perfil from usuarios");

    if (isset($pdo) ) {echo "PDO esta ok";}
    else {echo "Revisa PDO";}
    echo "<br>";
    echo $host;
    echo "<br>";
    echo $namedb;
    echo "<br>";
    echo $userdb;
    echo "<br>";
    echo $conexion->contesta();
    //var_dump($conexion);


    
    //echo ($value);
?>
