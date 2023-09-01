
// fución para cargar la página antes de todo.
function cargarPagina(){
    //Timer para hacer un pequeño delay y transición.
    setTimeout(() => {
        (async () => { //async para que se ejecute primero esta alerta y hasta que se ejecute esta se ejecuta la otra.
            await Swal.fire({
                title: `<h2 style="color: #687B14;">¡Bienvenid@!</h2>`,
                icon: 'question',   
                background: 'rgba(52, 56, 56, 0.677)',             
                html: '<div style="font-family: Comic Sans MS; text-align: center;"> <h2 style="color: #efefef;"> El reto consiste en que busques los posibles riesgos que puedan haber en la sala de sistemas... </h2> <h2 style="color: #efefef; margin-top: 50px;"> Ahora que ya conoces un poco más ¡Vamos..! </h2> </div> ',
                confirmButtonText: '¡A jugar!',
                width: '90%',
                height: '800px',
                BackDrop: true,
                allowEscapeKey : false,
                allowOutsideClick: false,
                allowSideClick: false,
                allowEnterKey: false,
            });
            setTimeout(() => {      
                generarNumero();         
                Swal.fire({
                    title: preguntas[eliminar],
                    icon: 'question',
                    confirmButtonText: 'siguiente',
                    width: '20%',
                    height: '600px',
                    BackDrop: true,
                    allowOutsideClick: false,
                    allowScapeKey: false,
                    allowEnterKey: false,
                });
            }, 1100);
        })()
    }, 500) 
}











