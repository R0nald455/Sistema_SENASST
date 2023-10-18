

// fución para cargar la página antes de todo.
function inicioPagina(){
    //Timer para hacer un pequeño delay y transición.
    setTimeout(() => {
        (async () => { //async para que se ejecute primero esta alerta y hasta que se ejecute esta se ejecuta la otra.
            await Swal.fire({
                title: '<h1 style="display:flex; margin:auto; width: 200px; height: 200px;background-image: url(./img/logoVerde.png);background-size: cover;background-attachment: contain;background-position: center;"></h1><h2 style="color:#9ee551;">¡Bienvenid@! Aquí tienes las instrucciones del juego para interactuar con el area del internado del CBA:</h2>',
                html: '<div style="position: absolute; width: 300px; height: 300px; margin:auto;"> </h1></div><div style=" font-family: Comic Sans MS; text-align: left; color:white; font-size:23px"><h4>--Cuando preciones el botón de "iniciar aventura" inmediatamente te saldrá una alerta con el acertijo del elemento que debes buscar. </h4> <h4>--Preciona el click izquierdo sin soltarlo y luego arrastra el mouse arriba, abajo o a los lados para moverte por el escenario de 360°. </h4> <h4>--Busca componentes relacionados con SST como lo son señales y elementos, dependiendo del acertijo que te aparezca al inicio. </h4> <h4>--Ubica la esfera que tienes en el centro de la pantalla en los objetos que creas considerables como componentes de SST y que tengan relación con la pregunta inicial. Luego, te saldrá una alerta dependiendo de si lo que encontraste es correcto o no, y de ser correcto, te dará una definición relacionada a lo que has encontrado.</h4><h4>--Preciona "siguiente" luego de que hayas recibido la definición y sepas para que funciona, así te saldrá un nuevo elemento o señal para buscar.</h4><h4>--Por último, lo importante es que aprendas mucho, así que sin prisas y... ¡Presta atención a todo!.</h4><p style="font-size: 15px; float: right;">Imágen 360° © 2023 José Santiago Suárez Pérez.</p></div>',
                icon: 'info',
                confirmButtonColor: 'green',
                confirmButtonText: 'Inicar aventura',
                width: '90%',
                background: '#000000e9',
                BackDrop: true,
                allowEscapeKey : false,
                allowOutsideClick: false,
                allowEnterKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    reanudarMusicaDeFondo();
                }
            });
            setTimeout(() => {      
                generarNumero();         
                    Swal.fire({
                        title: 'Acertijo',
                        color: 'yellow',
                        html: `<div style="position: absolute; width: 300px; height: 300px; margin-left: -120px; margin-top: -304px;"> <h1 style="        
                        display: flex;
                        width: 200px;
                        height: 200px;
                        background-image: url(./img-elementos/logoVerde.png);
                        background-size: cover;
                        background-attachment: contain;
                        background-position: center;"> 
                        </h1> </div>
                        </h1></div> 
                        <div style="position: absolute; width: 300px; height: 300px; margin-left: 660px; margin-top: 110px;"> <h1 style="        
                        display: flex;
                        width: 100px;
                        height: 100px;
                        background-image: url(./img-elementos/pensando.gif);
                        background-size: cover;
                        background-attachment: contain;
                        background-position: center;"> 
                        </h1></div>
                        <div style="font-family: Comic Sans MS; text-align: center;"> <h2 style="color: rgba(237, 193, 37, 0.874);
                        "> ${preguntas[eliminar]} </h2> </div>`,
                        icon: 'question',   
                        background: 'rgba(52, 56, 56, 0.677)',             
                        confirmButtonText: 'Buscar',
                        confirmButtonColor: 'Orange',
                        width: '40%',
                        height: '800px',
                        BackDrop: true,
                        allowEscapeKey : false,
                        allowOutsideClick: false,
                        allowSideClick: false,
                        allowEnterKey: false,
                    });
            }, 500);
        })()
    }, 500) 
}

