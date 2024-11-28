<div id="notification" class="notification hidden"></div>


<div id="notification" class="notification hidden"></div>

<script>
    function mostrarNotificacion(mensaje, tipo = 'success') {
        const notificacion = document.getElementById('notification');
        notificacion.innerText = mensaje;
        notificacion.className = `notification ${tipo}`;
        notificacion.style.opacity = '1';
        notificacion.style.transform = 'translateY(0)';
        
        // Ocultar después de 5 segundos
        setTimeout(() => {
            notificacion.style.opacity = '0';
            notificacion.style.transform = 'translateY(-20px)';
        }, 5000);
    }
</script>
