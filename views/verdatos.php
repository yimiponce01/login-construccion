<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
// require_once $_SERVER['DOCUMENT_ROOT']. '/models/conexion.php';

session_start();


if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

$conexion = new conexion($host, $namedb, $userdb, $paswordb);
//$conexion->conectar(); se puso ene l constructor

$pdo = $conexion->obtenerConexion();

$query = $pdo->query("select id,username,password,perfil from usuarios");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista de Usuarios del Sistema</title>
    <style>
        .user-table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        .user-table th,
        .user-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .user-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .user-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .user-table tr:hover {
            background-color: #e2e2e2;
        }
    </style>
</head>

<body>
    <h2>Lista de Usuarios del Sistema</h2>
    <table class="user-table">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Perfil</th>
        </tr>
        <?php
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php echo htmlspecialchars($fila['id']); ?></td>
                <td><?php echo htmlspecialchars($fila['username']); ?></td>
                <td><?php echo htmlspecialchars($fila['password']); ?></td>
                <td><?php echo htmlspecialchars($fila['perfil']); ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>