<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';


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
            <header class="header">BIENVENIDO AL SISTEMA</header>
            <aside class="container">
                <div class="menu menu-vertical">
                    <h3>MENU</h3>
                    <ul>
                        <li><a href="?opcion=ver">Ver</a></li>
                        <li><a href="?opcion=ingresar">Ingresar</a></li>
                        <li><a href="?opcion=modificar">Modificar</a></li>
                        <li><a href="?opcion=eliminar">Eliminar</a></li>
                        <li><a href="<?php echo get_controllers('logout.php') ?>">salir</a></li>
                    </ul>
                </div>
            </aside>

        <main class="content">
            
            <div class="contenido">
                <?php
                if (isset($_GET["opcion"])) {
                    $opcion = $_GET["opcion"];
                    switch ($opcion) {
                        /*case '':
                            <p>hola</p>
                            break;*/
                        case 'ver':
                            echo "<iframe src='" . get_controllers("controladorusuario.php") . "' ></iframe>";
                            break;
                        case 'ingresar':
                            echo "<iframe src='" . get_views(arg1: "ingresardatos.php") . "' ></iframe>";
                            break;
                        case 'modificar':
                            echo "<iframe src='" . get_views(arg1: "modificardatos.php") . "' ></iframe>";
                            break;
                        case 'eliminar':
                            echo "<iframe src='" . get_views(arg1: "eliminardatos.php") . "' ></iframe>";
                            break;
                    }
                }else {
                    // Mensaje inicial cuando no se ha seleccionado ninguna opción
                    echo "<p>¡Bienvenido! Seleccione una opción del menú para comenzar.</p>";
                }
                ?>

            </div>
        </main>

        <footer class="footer">
            <p>&copy; 2024 Mi Sitio Web. <a href="#">Términos y condiciones</a> | <a href="#">Autor: Yimi Kevin Ponce Rojas</a></p>
        </footer>

</body>

</html>