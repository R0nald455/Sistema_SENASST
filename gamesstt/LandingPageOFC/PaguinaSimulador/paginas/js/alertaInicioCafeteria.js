
// fución para cargar la página antes de todo.
function cargarPagina(){

    //Timer para hacer un pequeño delay y transición.
    setTimeout(() => {
        (async () => { //async para que se ejecute primero esta alerta y hasta que se ejecute esta se ejecuta la otra.
            await Swal.fire({
                title: `<h2 style="color: #687B14;">¡Bienvenid@! al escenario de cafeteria. </h2>`,
                icon: 'question',   
                background: 'rgba(52, 56, 56, 0.677)',             
                html: '<div style="font-family: Comic Sans MS; text-align: center;"> <h2 style="color: #efefef;"> El reto consiste en que busques los posibles riesgos que puedan haber en el escenario de cafeteria. </h2> <h2 style="color: #efefef; margin-top: 50px;"> Ahora que ya conoces un poco más ¡Vamos..! </h2> </div> ',
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
                        title: 'Acertijo',
                        color: 'yellow',
                        html: `<div style="position: absolute; width: 300px; height: 300px; margin-left: -120px; margin-top: -302px;"> <h1 style="        
                        display: flex;
                        width: 200px;
                        height: 200px;
                        background-image: url(./img-riesgos/logoVerde.png);
                        background-size: cover;
                        background-attachment: contain;
                        background-position: center;"> 
                        </h1></div>
                        <div style="position: absolute; width: 300px; height: 300px; margin-left: 660px; margin-top: 90px;"> <h1 style="        
                        display: flex;
                        width: 100px;
                        height: 100px;
                        background-image: url(./img-/pensando.gif);
                        background-size: cover;
                        background-attachment: contain;
                        background-position: center;"> 
                        </h1></div>
                        <div style="font-family: Comic Sans MS; text-align: center;"> <h2 style="color: rgba(237, 193, 37, 0.874)"> ${preguntas[eliminar]} </h2> </div>`,
                        icon: 'question',   
                        background: 'rgba(52, 56, 56, 0.677)',             
                        confirmButtonText: 'Siguiente',
                        confirmButtonColor: 'orange',
                        width: '40%',
                        height: '800px',
                        BackDrop: true,
                        allowEscapeKey : false,
                        allowOutsideClick: false,
                        allowSideClick: false,
                        allowEnterKey: false,
                    });
            }, 1100);
        })()
    }, 500) 
}

