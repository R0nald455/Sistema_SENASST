const formulario = document.querySelector('#p-4');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    email();
});

function email(){
    const datos = new FormData(formulario);
    fetch('enviarAlerta.php',{
        method: 'POST',
        body: datos
    })
    .then(res => res.json())
    .then(res => {
        console.log(res);
        if('alerto'){
            Swal.fire({
                imageUrl: 'https://i.imgur.com/dCDc5eC.gif',
                imageHeight: 200,
                imageAlt: 'SST Confirmacion',
                title: "¡Alerta enviada exitosamente!",
                showConfirmButton: true,
                confirmButtonColor: "#dc3545",
                timer: 6000,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                html: "La alerta del incidente llegará a todos los brigadistas. Llegará al lugar el brigadista que se encuentre mas cerca. <b>MANTENGASE A SALVO</b>",
            });
        }else{
            Swal.fire({
                icon: "error",
                title: "Oops",
                text: "Hubo un error al enviar la alerta.",
            });
        }

    })
}