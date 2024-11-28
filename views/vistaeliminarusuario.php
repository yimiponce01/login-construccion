<?php
include $_SERVER['DOCUMENT_ROOT'] . '/views/vistanotificacion.php';

function mostrarformularioeliminar($mensaje = '')
{
    ?>
    <head>
        <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
    </head>

    <form action="/controllers/controladoreliminarusuario.php" method="POST">
        <h1 style="text-align: center;">Elimina un Usuario</h1>
        <br>
        <label for="">Usuario</label>
        <input type="text" name="datusuario" id="datusuario">
        <br>
        <button type="submit">Eliminar</button>
    </form>
    <?php
    // Muestra la notificación flotante solo si hay un mensaje
    if (!empty($mensaje)) {
        echo "<script>mostrarNotificacion('$mensaje', 'success');</script>";
    }
}
?>
