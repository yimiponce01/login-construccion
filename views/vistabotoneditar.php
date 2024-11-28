<?php
function mostrarformulariobotonedicion($usuario)
{
    ?>

    <head>
        <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css'); ?>">
    </head>

    <form id="editUserForm" action="/controllers/controladorbotoneditar.php" method="POST">
        <input type="hidden" id="custId" name="custId" value="<?php echo $usuario['id']; ?>">

        <h1 style="text-align: center;">Actualiza el Usuario <?php echo $usuario['username']; ?></h1>
        <br>
        <label for="datusuario">Usuario</label>
        <input type="text" name="datusuario" id="datusuario" value="<?php echo $usuario['username']; ?>">
        <br>
        <label for="datpassword">Password</label>
        <input type="password" name="datpassword" id="datpassword" value="<?php echo $usuario['password']; ?>">
        <br>
        <label for="datperfil">Perfil</label>
        <input type="text" name="datperfil" id="datperfil" value="<?php echo $usuario['perfil']; ?>">
        <br>
        <button type="submit">Actualizar Usuario</button>
    </form>

    <script>

         // Recarga de estilos para asegurar la aplicación
        const styleSheets = document.styleSheets;
        for (let i = 0; i < styleSheets.length; i++) {
            styleSheets[i].disabled = true;
            styleSheets[i].disabled = false;
        }

        document.getElementById("editUserForm").addEventListener("submit", function (e) {
            e.preventDefault(); // Evita el envío normal del formulario

            const formData = new FormData(this);

            fetch("/controllers/controladorbotoneditar.php", {
                method: "POST",
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Error al actualizar el usuario");
                    }
                    return response.text();
                })
                .then((data) => {
                    if (data === "success") {
                        // Redirige a la tabla actualizada en el contenedor correcto
                        window.parent.location.href = "/controllers/controladordashboard.php?opcion=ver";
                    } else {
                        console.error(data); // Mostrar cualquier mensaje de error
                    }
                })
                .catch((error) => console.error(error));
        });
    </script>

    <?php
}
?>
