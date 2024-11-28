<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaingresarusuario.php';
include $_SERVER['DOCUMENT_ROOT'] . '/views/vistanotificacion.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit;
}

$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"] ?? null;
    $tmpdatpassword = $_POST["datpassword"] ?? null;
    $tmpdatperfil = $_POST["datperfil"] ?? null;

    if (!empty($tmpdatusuario) && !empty($tmpdatpassword) && !empty($tmpdatperfil)) {
        $modelousuario = new modelousuario();
        try {
            // Inserción del usuario
            $modelousuario->insertarUsuario($tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
            
            
            // Notificación de éxito
            echo "<script>
                mostrarNotificacion('Usuario registrado con éxito', 'success');
                setTimeout(function() {
                    parent.document.querySelector('iframe').src = '/controllers/controladorusuario.php';
                },);
            </script>";
        } catch (PDOException $e) {
            // Notificación de error
            echo "<script>
                    mostrarNotificacion('Hubo un error al registrar el usuario: {$e->getMessage()}', 'error');
                </script>";
        }
    } else {
        // Notificación por datos incompletos
        echo "<script>
                mostrarNotificacion('Por favor, complete todos los campos.', 'warning');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
</head>
<body>
    <?php mostrarFormularioIngreso($mensaje); ?>
</body>
</html>