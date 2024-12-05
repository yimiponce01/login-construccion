<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
</head>

<body>
    <header class="header">SISTEMA DE YIMI K.P.R</header>
    <aside class="container">
        <div class="menu menu-vertical">
            <h3>MENU</h3>
            <ul>
                <li><a href="/controllers/controladordashboard.php?opcion=ver">Ver</a></li>
                <li><a href="/controllers/controladordashboard.php?opcion=ingresar">Ingresar</a></li>
                <li><a href="/controllers/controladordashboard.php?opcion=modificar">Modificar</a></li>
                <li><a href="/controllers/controladordashboard.php?opcion=eliminar">Eliminar</a></li>
                <li><a href="<?php echo get_controllers('logout.php'); ?>">Salir</a></li>
            </ul>

        </div>
    </aside>

    <main class="content">
        <div class="contenido">
            <?php
            if (isset($contenido)){
                echo $contenido;
            }else{
                echo "<h1> SISTEMA DE YIMI K.P.R </h1> ";
            }
            ?>
            
        </div>
    </main>

    <?php
if (isset($mensaje) && isset($tipo)) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            mostrarNotificacion('$mensaje', '$tipo');
        });
    </script>";
}
?>


    <footer class="footer">
        <p>&copy; 2024 Mi Sitio Web. <a href="#">Términos y condiciones</a> | <a href="#">Autor: Yimi Kevin Ponce
                Rojas</a></p>
    </footer>
</body>

</html>