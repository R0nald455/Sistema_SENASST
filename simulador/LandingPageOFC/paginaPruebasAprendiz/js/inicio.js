
// fución para cargar la página antes de todo.
function inicioPagina(){
    //Timer para hacer un pequeño delay y transición.
    setTimeout(() => {
        (async () => { //async para que se ejecute primero esta alerta y hasta que se ejecute esta se ejecuta la otra.
            await Swal.fire({
                title: `<h2 style="color: #687B14;">¡Bienvenid@! Vamos a validar tu conocimiento.</h2>`,
                icon: 'question',   
                background: '#000000',             
                html: '<div style="font-family: Comic Sans MS; text-align: center;"> <h2 style="color: #efefef;"> Mediante esta prueba vas a conocer lo que aprendiste interactuando con los escenarios dinámicos. </h2>  </div> ',
                confirmButtonText: 'Presentar prueba',
                width: '90%',
                input: Text,
                height: '2100px',
                BackDrop: true,
                allowEscapeKey : false,
                allowOutsideClick: false,
                allowSideClick: false,
                allowEnterKey: false,
            });
        })()
    }, 500) 
}











