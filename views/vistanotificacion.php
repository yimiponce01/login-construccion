<div id="notification" class="notification hidden"></div>

<script>
function mostrarNotificacion(mensaje, tipo = 'success') {
    const notificacion = document.getElementById('notification');
    notificacion.innerText = mensaje;
    notificacion.className = `notification ${tipo} visible`;
    
    // Ocultar después de 5 segundos
    setTimeout(() => {
        notificacion.className = `notification ${tipo}`;
    }, 5000);
}
</script>
