const formulario = document.querySelector('#contact-form');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    email();
});

function email(){
    const datos = new FormData(formulario);
    fetch('soporte/script_soporte.php',{
        method: 'POST',
        body: datos
    })
    .then(res => res.json())
    .then(res => {
        console.log(res);
        if('exito'){
            Swal.fire({
                icon: "success",
                title: "¡Correo enviado!",
                text: "El correo se envió exitosamente.",
            });
        }else{
            Swal.fire({
                icon: "error",
                title: "Oops",
                text: "Hubo un error al enviar el correo.",
            });
        }

    })
}