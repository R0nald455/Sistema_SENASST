document
  .getElementById("cerrar-sesion")
  .addEventListener("click", function (event) {
    event.preventDefault(); // Evita que el enlace actúe como un enlace normal

    // Muestra la alerta con las opciones "Sí" o "No"
    Swal.fire({
      imageUrl: "https://i.imgur.com/nY5BYAE.gif",
      imageHeight: 200,
      imageAlt: "SST Confirmacion",
      title: "¿Estás seguro de que quieres cerrar la sesión?",
      text: "Al cerrar la sesión, tendrás que volver a iniciar de nuevo para acceder a la informacion.",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      // Si el usuario hace clic en "Sí", redirige a la página de cierre de sesión
      if (result.isConfirmed) {
        window.location.href = "../cerrarSesion.php";
      }
    });
  });
