
<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaingresarusuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $tmpdatusuario = $_POST["datusuario"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];

    $modelousuario = new modelousuario();

    try{
    $modelousuario->insertarUsuario($tmpdatusuario,$tmpdatpassword,$tmpdatperfil);
    $mensaje= "usuario registrado con exito";
    }catch(PDOException $e){
        $mensaje= "hubo un error ...<br>".$e->getMessage();
    }
     //corta la ejecucion
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <div style="display: block;margin: 0 auto;text-align: center; position: relative; top: 35%; transform: translateY(-50%);font-size: 0.5rem; overflow: hidden">
    <h2 style="font-size: 2rem;"> Ingresar Usuario</h2>
    <br>
    <!-- Vincula tu archivo CSS -->
    <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
</head>
<body>
    <!-- Aquí mostramos el formulario con tus estilos -->
    <?php mostrarFormularioIngreso($mensaje); ?>
</body>
</html>