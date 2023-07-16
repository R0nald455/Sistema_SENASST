document.getElementById("contact-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que se envíe el formulario por defecto

    // Obtén los valores de los campos del formulario
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let message = document.getElementById("message").value;

    // Envía los datos por correo electrónico utilizando la API de envío de correo del lado del servidor

    // Ejemplo de envío de datos utilizando Fetch API (AJAX)
    fetch("../php/script_soporte.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ name: name, email: email, message: message })
    })
    .then(function(response) {
        // Aquí puedes manejar la respuesta del servidor
        console.log("Correo enviado exitosamente");
        alert("¡Gracias por contactarnos! Te responderemos lo antes posible.");
        document.getElementById("contact-form").reset(); // Reinicia el formulario después de enviarlo
    })
    .catch(function(error) {
        // Aquí puedes manejar el error en caso de fallo en el envío del correo
        console.error("Error al enviar el correo:", error);
        alert("Ocurrió un error al enviar el formulario. Por favor, inténtalo de nuevo más tarde.");
    });
});
