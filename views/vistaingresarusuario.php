<?php 

function mostrarFormularioIngreso($mensaje){
    if (empty($mensaje)){

?>

<form action="/controllers/controladoringresarusuario.php" method="POST">
    <label for="datusuario">Usuario</label>
        <input type="text" name="datusuario" id="datusuario">
    <br>
    <label for="datpasword">password</label>
        <input type="password" name="datpassword" id="datpassword">
    <br>
    <label for="datperfil">perfil</label>
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