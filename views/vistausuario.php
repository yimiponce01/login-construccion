<head>
    <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
</head>

<?php
function mostrarUsuarios($usuarios)
{
    ?>
    <div style="display: block;">
        <h2 class="titulo-tabla">Lista de Usuarios del Sistema</h2>
        <div class="tabla-usuarios">
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
                foreach ($usuarios as $usuario) {
                    ?>
                    <tr>
                        <td><?php echo $usuario['id'] ?></td>
                        <td><?php echo $usuario['username'] ?></td>
                        <td><?php echo $usuario['password'] ?></td>
                        <td><?php echo $usuario['perfil'] ?></td>
                        <td><a href="/controllers/controladorbotoneditar.php?id=<?php echo $usuario['id']; ?>"class="editar">Editar</a></td>
                        <td><a href="#" class="eliminar" onclick="eliminarUsuario(<?php echo $usuario['id']; ?>)">Eliminar</a>
                        </td>


                    </tr>
                    <?php
                }
                ?>
        </div>
        </table>
    </div>

    <head>
        <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css'); ?>">
    </head>
    <script>

        function eliminarUsuario(id) {
            fetch(`/controllers/controladorbotoneliminar.php?id=${id}`, {
                method: 'GET',
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('No se pudo eliminar el usuario');
                    }
                    return response.text(); // Obtener el HTML de la tabla actualizado
                })
                .then(data => {
                    // Reemplaza el contenido de la tabla
                    document.querySelector('.tabla-usuarios').innerHTML = data;


                    recargarEstilos();

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function recargarEstilos() {
            // Recargar estilos en el DOM
            const styleSheets = document.styleSheets;
            for (let i = 0; i < styleSheets.length; i++) {
                styleSheets[i].disabled = true;
                styleSheets[i].disabled = false;
            }

            // Verificar que los eventos hover y estilos se mantengan
            const editLinks = document.querySelectorAll('.editar');
            const deleteLinks = document.querySelectorAll('.eliminar');

            // Asegurar que las clases estén activas
            editLinks.forEach(link => {
                if (!link.classList.contains('editar')) {
                    link.classList.add('editar');
                }
            });

            deleteLinks.forEach(link => {
                if (!link.classList.contains('eliminar')) {
                    link.classList.add('eliminar');
                }
            });
        }

        // Llamar a la recarga de estilos al cargar la página
        document.addEventListener('DOMContentLoaded', recargarEstilos);
    </script>

<?php }
?>