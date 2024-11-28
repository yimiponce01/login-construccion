<?php
include $_SERVER['DOCUMENT_ROOT'] . '/views/vistanotificacion.php';
function mostrarformulariobusqueda($mensaje = '')
{
    if (!empty($mensaje)) {
        echo $mensaje;
        echo "<br>";
    }
    ?>

    <head>
        <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
        
    </head>

    <form action="/controllers/controladoractualizarusuario.php" method="POST">
        <h1 style="text-align: center;">Modifica un Usuario</h1>
        <br>
        <label for="">Usuario</label>
        <input type="text" name="datusuario" id="datusuario">
        <br>
        <button type="submit">Buscar</button>
    </form>
    <?php
}
function mostrarformularioedicion($usuario, $mensaje = '')
{
    ?>

    <head>
        <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
    </head>

    <form action="/controllers/controladoractualizarusuario.php" method="POST">
        <input type="hidden" id="custId" name="custId" value="<?php echo $usuario['id'] ?>">

        <h1 style="text-align: center;">Actualiza el Usuario <?php echo $usuario['username'] ?></h1>
        <br>
        <label for="datusuario">Usuario</label>
        <input type="text" name="datusuario" id="datusuario" value="<?php echo $usuario['username'] ?>">
        <br>
        <label for="datpasword">password</label>
        <input type="password" name="datpassword" id="datpassword" value="<?php echo $usuario['password'] ?>">
        <br>
        <label for="datperfil">usuario</label>
        <input type="text" name="datperfil" id="datperfil" value="<?php echo $usuario['perfil'] ?>">
        <br>
        <button type="submit">Actualizar usuario</button>
    </form>
    <?php
}
