<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';

echo "<link rel='stylesheet' href='" . get_UrlBase('./css/estilodashboard.css') . "'>";


if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    $modelousuario = new modelousuario();

    try {
        // Eliminar al usuario
        $modelousuario->eliminarUsuarioPorId($idUsuario);

        // Obtener la lista actualizada de usuarios
        $usuarios = $modelousuario->obtenerusuarios(); // Asegúrate de tener este método en tu modelo


        // Generar la tabla actualizada
        echo "<table class='user-table'>";
        echo "<tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Perfil</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>";
        foreach ($usuarios as $usuario) {
            echo "<tr>
                    <td>{$usuario['id']}</td>
                    <td>{$usuario['username']}</td>
                    <td>{$usuario['password']}</td>
                    <td>{$usuario['perfil']}</td>
                    <td><a href='/controllers/controladorbotoneditar.php?id={$usuario['id']}' class='editar'>Editar</a></td>                    
                    <td><a href='#' class='eliminar' onclick='eliminarUsuario({$usuario['id']})'>Eliminar</a></td>
                </tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Error al eliminar el usuario: " . $e->getMessage();
    }
} else {
    http_response_code(400);
    echo "ID de usuario no proporcionado.";
}



?>