
// // Evita que el formulario se envíe automáticamente al presionar el botón
// document.querySelector("form").addEventListener("submit", function(event) {
//     event.preventDefault();

//     // Realiza una solicitud al servidor para generar el número aleatorio
//     fetch(window.location.href, {
//         method: "POST",
//         body: new URLSearchParams("generateRandom=true"),
//         headers: {
//             "Content-Type": "application/x-www-form-urlencoded"
//         }
//     }).then(function(response) {
//         // Actualiza la página para mostrar el nuevo número aleatorio
//         window.location.reload();
//     });
// });
