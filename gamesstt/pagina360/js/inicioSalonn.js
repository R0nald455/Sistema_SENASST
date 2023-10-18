
// fución para cargar la página antes de todo.
function inicioPagina(){
    //Timer para hacer un pequeño delay y transición.
    setTimeout(() => {
        (async () => { //async para que se ejecute primero esta alerta y hasta que se ejecute esta se ejecuta la otra.
            await Swal.fire({
                title: `<h2 style="color: #687B14;">¡Bienvenid@! al escenario de sistemas en 360°</h2>`,
                icon: 'question',   
                background: 'rgba(52, 56, 56, 0.677)',             
                html: '<div style="font-family: Comic Sans MS; text-align: center;"> <h2 style="color: #efefef;"> Escenario de prueba para buscar cosas relacionadas con SST como lo son señales, elementos de emergencia y riesgos. </h2> <h2 style="color: #efefef; margin-top: 50px;"> Ahora que ya conoces un poco más de que se trata ¡Vamos..! </h2> </div> ',
                confirmButtonText: '¡Iniciar aventura!',
                width: '90%',
                height: '800px',
                BackDrop: true,
                allowEscapeKey : false,
                allowOutsideClick: false,
                allowSideClick: false,
                allowEnterKey: false,
            });
        })()
    }, 500) 
}





