<?php
session_start();

// Verifica si hay un mensaje de notificación en la sesión
if (isset($_SESSION['notificacion'])) {
    $notificacion = $_SESSION['notificacion'];
    $tipo = $_SESSION['tipo'] ?? 'success'; // Por defecto, será de tipo 'success'

    // Borra el mensaje de la sesión después de mostrarlo
    unset($_SESSION['notificacion'], $_SESSION['tipo']);

    // Retorna el mensaje y tipo como un script para mostrar la notificación
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            mostrarNotificacion('$notificacion', '$tipo');
        });
    </script>";
}
?>
