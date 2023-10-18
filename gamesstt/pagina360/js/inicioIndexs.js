
// fución para cargar la página antes de todo.
function inicioPagina(){
    //Timer para hacer un pequeño delay y transición.
    setTimeout(() => {
        (async () => { //async para que se ejecute primero esta alerta y hasta que se ejecute esta se ejecuta la otra.
            Swal.fire({
                title: '<h2 style="color:#9ee551;">¡Bienvenid@! Aquí tienes las instrucciones del juego para interactuar con el area de recursos naturales del CBA:</h2>',
                html: '<div style="position: absolute; width: 300px; height: 300px; left: -100px; top: -90px;"> <h1 style="display: flex; width: 200px;height: 200px;background-image: url(./img/logoVerde.png);background-size: cover;background-attachment: contain;background-position: center;"></h1></div><div style=" font-family: Comic Sans MS; text-align: left; color:white; font-size:25px"> <h4>--Preciona el click izquierdo sin soltarlo y luego arrastra el mouse arriba, abajo o a los lados para moverte por el escenario de 360°. </h4> <h4>--Busca componentes relacionados con SST como lo son señales, elementos y riesgos. </h4> <h4>--Ubica la esfera que tienes en el centro de la pantalla en los objetos que creas considerables como componentes de SST. Si te sale una alerta es porque encontraste un elemento, riesgo o señal y te dará un retroalimentación relacionada a lo que has encontrado.</h4><h4>--Por último, lo importante es que aprendas mucho, así que sin prisas y... ¡Presta atención a todo!.</h4></div>',
                icon: 'info',
                confirmButtonColor: 'green',
                confirmButtonText: 'Inicar aventura',
                width: '90%',
                background: 'rgba(52, 56, 56, 0.677)',
                BackDrop: true,
                allowEscapeKey : false,
                allowOutsideClick: false,
                allowEnterKey: false
            });
        })()
    }, 500) 
}







