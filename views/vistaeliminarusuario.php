<?php
function mostrarformularioeliminar($mensaje = '')
{
    if (!empty($mensaje)) {
        echo $mensaje;
    } else {
        ?>
        <head>
            <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
            <style>
            .mensaje {
                text-align: center;
                color: #000;
                font-size: 16px;
                margin-bottom: 20px;
            }
        </style>
        </head>

        <form action="/controllers/controladoreliminarusuario.php" method="POST">
            <h1 style="text-align: center;">Elimina un Usuario</h1>
            <br>
            <label for="">Usuario</label>
            <input type="text" name="datusuario" id="datusuario">
            <br>
            <button type="submit">Eliminar</button>
        </form>
        <p class="mensaje"><?php echo $mensaje; ?></p>
        <?php
    }
}
?>