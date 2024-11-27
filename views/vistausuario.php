<head>
    <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
</head>

<?php
function mostrarUsuarios($usuarios)
{
?>
    <div style="display: block;">
    <h2 class="titulo-tabla">Lista de Usuarios del Sistema</h2>
    <table class="user-table">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Perfil</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        <?php
        foreach ($usuarios as $usuario) 
        {
        ?>
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['username'] ?></td>
                <td><?php echo $usuario['password'] ?></td>
                <td><?php echo $usuario['perfil'] ?></td>
                <td> <a href= "#">editar</a></td>
                <td> <a href="#">eliminar</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>
    <?php } 
    ?>
