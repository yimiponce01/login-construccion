<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/views/vistanotificacion.php';
function mostrarFormularioIngreso($mensaje){
    if (empty($mensaje)){

?>

<form action="/controllers/controladoringresarusuario.php" method="POST">
    <h2 style="font-size: 2rem;"> Ingresar Usuario</h2>
    <br>
    <label for="datusuario">Usuario</label>
        <input type="text" name="datusuario" id="datusuario">
    <br>
    <label for="datpasword">Password</label>
        <input type="password" name="datpassword" id="datpassword">
    <br>
    <label for="datperfil">Perfil</label>
        <input type="datperfil" name="datperfil" id="datperfil">
    <br>
    <button type="submit">registrar usuario</button>
</form>

<?php
}
    else{
    echo $mensaje;
}
}
?>