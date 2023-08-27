document.getElementById('cerrar-sesion').addEventListener('click', function(event) {
    event.preventDefault(); // Evita que el enlace actúe como un enlace normal

    // Muestra la alerta con las opciones "Sí" o "No"
    let confirmacion = confirm("¿Estás seguro de que quieres cerrar la sesión?");
    
    // Si el usuario hace clic en "Aceptar" (Sí), redirige a la página de cierre de sesión
    if (confirmacion) {
        window.location.href = "../cerrarSesion.php";
    }
});