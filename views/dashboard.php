<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
</head>

<body>

    <div class="header">BIENVENIDO AL SISTEMA</div>

    <div class="container">
        <div class="menu">
            <h3>MENU</h3>
            <ul>
                <li><a href="?opcion=nicio">inicio</a></li>
                <li><a href="?opcion=ver">ver</a></li>
                <li><a href="?opcion=ingresar">ingresar</a></li>
                <li><a href="?opcion=modificar">modificar</a></li>
                <li><a href="?opcion=eliminar">eliminar</a></li>
                <li><a href="<?php echo get_controllers('logout.php') ?>">salir</a></li>
            </ul>
        </div>

        <div class="contenido">
            <?php
            if (isset($_GET["opcion"])) {
                $opcion = $_GET["opcion"];
                switch ($opcion) {
                    case 'inicio':
                        echo "<H1> BIENVENIDO AL SISTEMA <H1>";
                        break;
                    case 'ver':
                        echo "<iframe src='". get_views("verdatos.php"). "' ></iframe>";
                        break;
                    case 'ingresar':
                        echo "<iframe src='". get_views(arg1: "ingresardatos.php"). "' ></iframe>";
                        break;
                    case 'modificar':
                        echo "<iframe src='". get_views(arg1: "modificardatos.php"). "' ></iframe>";
                        break;
                    case 'eliminar':
                        echo "<iframe src='". get_views(arg1: "eliminardatos.php"). "' ></iframe>";
                        break;
                }

                echo $opcion;
            }
            ?>

        </div>

    </div>

</body>

</html>