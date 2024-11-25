<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
// require_once $_SERVER['DOCUMENT_ROOT']. '/models/conexion.php';

session_start();


if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $tmpdatusuario = $_POST["datusuario"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];

    $conexion = new conexion(); //($host, $namedb, $userdb, $paswordb);
    $pdo = $conexion->obtenerConexion();

    try{
    $sentencia = $pdo->prepare("INSERT INTO usuarios  (username, password, perfil) VALUES (?,?,?);");
    $sentencia->execute([$tmpdatusuario,$tmpdatpassword,$tmpdatperfil]);
    echo "usuario registrado con exito <br>";
    }catch(PDOException $e){
        echo "hubo un error ...<br>";
        echo $e->getMessage();
    }
    exit(); //corta la ejecucion
}

?>
<head>
<link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
</head>

    <form action="" method="POST">
    <h1 style="text-align: center;">Ingresa un Usuario</h1>

        <label for="datusuario">Usuario</label>
            <input type="text" name="datusuario" id="datusuario">
        
        <label for="datpasword">Password</label>
            <input type="password" name="datpassword" id="datpassword">
        
        <label for="datperfil">Perfil</label>
            <input type="datperfil" name="datperfil" id="datperfil">
        
        <button type="submit">Registrar</button>
    </form>
