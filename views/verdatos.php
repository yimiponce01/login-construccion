<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
// require_once $_SERVER['DOCUMENT_ROOT']. '/models/conexion.php';

session_start();


if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

//$conexion = new conexion($host, $namedb, $userdb, $paswordb);
$conexion = new conexion();
//$conexion->conectar(); se puso ene l constructor

$pdo = $conexion->obtenerConexion();

$query = $pdo->query("select id,username,password,perfil from usuarios");
?>
<!DOCTYPE html>
<html>


<body>
<h2 class="titulo-tabla">Lista de Usuarios del Sistema</h2>
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