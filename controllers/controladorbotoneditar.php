<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistabotoneditar.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    $modelousuario = new modelousuario();

    try {
        // Obtener los datos del usuario por ID
        $usuario = $modelousuario->obtenerUsuarioPorId($idUsuario);

        // Mostrar el formulario de edición si se encuentra el usuario
        if ($usuario) {
            mostrarformulariobotonedicion($usuario);
        } else {
            echo "Usuario no encontrado.";
        }
    } catch (PDOException $e) {
        echo "Error al obtener el usuario: " . $e->getMessage();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar la actualización del usuario
    $idUsuario = $_POST["custId"];
    $username = $_POST["datusuario"];
    $password = $_POST["datpassword"];
    $perfil = $_POST["datperfil"];

    $modelousuario = new modelousuario();
    try {
        // Actualizar el usuario en la base de datos
        $modelousuario->actualizarusuarios($idUsuario, $username, $password, $perfil);

        // Responder con éxito para que el frontend maneje la redirección
        echo "success";
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Error al actualizar el usuario: " . $e->getMessage();
    }
} else {
    http_response_code(400);
    echo "Solicitud no válida.";
}
?>
