
//Definimos todas las variables
var preguntas = ["Es verde, rectangular y su función es guiarte al momento de evacuar.","Es triangular y un rayo en el centro suele llevar.","En una emergencia debes evacuar, así que la señal correspondiente debes ubicar.","No hace parte de este tema en general, pero te ayudará a identificar adónde debes ingresar.","Siempre estará en algún lugar, pues no siempre sabras que ruta tomar.","Cuando se trata de dolor, este lugar tiene su indicación.", "Cuenta con algo que puede aliviar tu dolor, ubicalo y descubre que es sanador.", "En algún momento se tendrá que usar, y tener presente adónde está, te ayudará, siempre y cuando lo sepas usar.","Su próposito es guiar en caso de necesidad, pero fijate que sea lo que debes usar.","Ubicalo en ocaciones donde sea útil servir, pues dos clases el puede combatir.","Está ahí para hacerlo más visible, ya que en emergencias sin esta puede ser invisible."];
const scoreSpan = document.querySelector('#scoreSpan');
const cSpan = document.querySelector('#correctaSpan');
const inSpan = document.querySelector('#incorrectaSpan');
const soundCorrect = document.getElementById("correct");
const soundIncorrect = document.getElementById("error");
const backgroundMusic = document.getElementById('backgroundMusic');
const elementoAEliminar = document.getElementById("elemento1");
const elementoAEliminar2 = document.getElementById("elemento2");
const elementoEliminado = [elementoAEliminar, elementoAEliminar2];

const extintorAmarillo = "Los extintores amarillos están diseñados para combatir incendios de Clase A, que involucran materiales combustibles sólidos como madera, papel y tela. Su color amarillo y las letras A en la señalización indican su capacidad para extinguir fuegos que involucran estos materiales. Los extintores de Clase A generalmente contienen agua o agentes químicos húmedos para enfriar y eliminar el calor del fuego, sofocando así las llamas.";
const extintorRojo = "El extintor rojo generalmente se utiliza para combatir incendios de Clase B y Clase C. Los incendios de Clase B involucran líquidos inflamables o combustibles, como aceites, grasas, gasolina, pinturas y productos químicos inflamables. Los incendios de Clase C son incendios eléctricos que involucran equipos eléctricos energizados.";

const señalSueloExtintor = "la señal en el suelo del extintor es un componente crucial para la seguridad, ya que indica dónde se encuentra el extintor, mejora la visibilidad en situaciones de emergencia y promueve la accesibilidad, lo que facilita una respuesta efectiva en caso de un incendio u otra emergencia relacionada con fuego.";


const respuestas = ['Encontraste una señal de ruta de evacuación que indica el camino (ruta) que debes de tomar en caso de que sea necesario evacuar.','Encontraste una señal de riesgo eléctrico que indica la presencia de un peligro relacionado con la electricidad. Es de forma triangular, con pictograma de color negro sobre fondo amarillo y debes tenerla siempre presente, ya que estará en cercanía de cableado, campos eléctricos y maquinaria.', 'Has encontrado la señal de ruta de evacuación, esta señal es esencial para la seguridad de todos. Las encontrarás en color verde y las letras en color blanco, lo cual nos indican cómo llegar a un lugar seguro en casos de incendio, terremotos y demás emergencias.', 'Aunque esta señalización de baños basada en la identidad de género no es una parte típica de las prácticas de SST, algunas empresas pueden adoptar estas medidas como parte de sus esfuerzos por crear entornos de trabajo inclusivos y respetuosos.','Encontraste una señal de ruta de evacuación que igualmente indica el camino (ruta) que debes de seguir en caso de que sea necesario evacuar, pero si te fijas está en otro lugar porque te indica el camino para que logres salir dependiendo en donde te encuentres.','Encontraste la señal del botiquín que es una señalización que indica la ubicación de un botiquín de primeros auxilios en un edificio o área específica. Su propósito principal es proporcionar acceso rápido a suministros médicos básicos en caso de lesiones o emergencias médicas.','Un botiquín de primeros auxilios es un equipo o conjunto de suministros médicos básicos que se utiliza para proporcionar atención inicial a personas que han sufrido lesiones o enfermedades leves. Estos botiquines están diseñados para ser utilizados en situaciones de emergencia y pueden contener una variedad de elementos esenciales, como vendas, apósitos, tijeras, pinzas, desinfectantes, analgésicos y otros suministros médicos.',extintorAmarillo,'Encontraste la señal del extintor amarillo, esta se utiliza para indicar la ubicación de un extintor de incendios específico que contiene agentes químicos húmedos, generalmente conocidos como extintores de agua. Estos extintores son adecuados para apagar incendios de Clase A, que involucran materiales combustibles sólidos como madera, papel y tela.', extintorRojo, señalSueloExtintor ];

const señalElemento = ['la señal.','la señal.','la señal.','la señal.','la señal.','la señal.','el elemento.','el elemento.','la señal.','el elemento.','la señal.'];


function reproducirCorrecta(){
    soundCorrect.play();
}

function reproducirIncorrecta(){
    soundIncorrect.play();
}

// Puedes pausar la música de fondo cuando sea necesario, por ejemplo, cuando se encuentra un elemento en el juego
function pausarMusicaDeFondo() {
  backgroundMusic.pause();
}

// O puedes reanudarla
function reanudarMusicaDeFondo() {
  backgroundMusic.play();
}


// O detenerla por completo al finalizar el juego
function detenerMusicaDeFondo() {
    backgroundMusic.pause();
    backgroundMusic.currentTime = 0; // Reinicia la posición de reproducción al principio
}

function ajustarVolumenError(nuevoVolumen) {
    if (nuevoVolumen >= 0 && nuevoVolumen <= 1) {
        soundIncorrect.volume = nuevoVolumen;
    }
}

function ajustarVolumenCorrect(nuevoVolumen) {
    if (nuevoVolumen >= 0 && nuevoVolumen <= 1) {
      soundCorrect.volume = nuevoVolumen;
    }
}

function ajustarVolumen(nuevoVolumen) {
    if (nuevoVolumen >= 0 && nuevoVolumen <= 1) {
        backgroundMusic.volume = nuevoVolumen;
    }
}

ajustarVolumenCorrect(0.2);
ajustarVolumenError(0.2);
ajustarVolumen(0.1);


let resultado = 0;
let resultadoC = 0;
let resultadoIn = 0;
var guardarArray = []; 
let alertaNorepite = 0;
let contar = 0;
let vacio = 0;
let l = [];    
let riesgos = null;
let termina = 0;


//Mostrarlos de forma aleatoria y que se terminé

function insertarEn(array,valor,posición){
    var inicio=array.slice(0,posición)
	var medio=valor
	var fin=array.slice(posición)
	var resultaddo=inicio.concat(medio).concat(fin)
	return resultaddo
}

function aleatoriosNoRepetidos(cantidad){
    var array=[]
	for(var i=0;i<cantidad;i++){
        array=insertarEn(array,i,Math.random()*(cantidad+1) )
	}
	return array
}

l=aleatoriosNoRepetidos(11); //Pasamos el parámetro de los números que necesitamos.

console.log(l);
var eliminar = 0;

// Función para generar la ficha correspondiente.
function generarNumero(){ 

    /*Guarda en esta varibale (Eliminar) los números aleatorios y, la variable contar hace referencia a el indice 0, ya que vale 0 la variable*/
    eliminar = (l[contar]); 
    console.log(eliminar);
    console.log(l);

    // Instrucción para cuando la variable dónde se guardo el arreglo de los números, queda vacía.

    // Recorrido para buscar los números de las fichas que ya han sido mostradas y luego las selecciona con la función de index.Of.
    for(var j=0; j<l.length; j++){
            if(l[j] == eliminar){
                var indicador = l.indexOf(l[j]);
                console.log(l);
            }
        }
        // Instrucción para eliminar el número de la ficha que seleccionó anteriormente en el recorrido.
        if (indicador > -1){
            l.splice(indicador, 1); //Elimina el número con la función de splice.
        }   

        if(eliminar == undefined){ 
            pausarMusicaDeFondo();
                Swal.fire({
                    title: `<h1 style="display:flex; margin:auto; width: 200px; height: 200px;background-image: url(./img/logoVerde.png);background-size: cover;background-attachment: contain;background-position: center;"></h1><h2 style="color: white; font-size: 25px;">Has terminado el juego.</h2>`,
                    html: '<h2 style="color: white;">¡Felicidades! Esperamos que hayas aprendido de una forma interactiva los elementos y señales importantes del area del internado en el CBA.</h2><h2 style="color: white;">Puedes checar e interactuar con más escenarios. Te esperamos pronto por aquí para que fortalezcas tu conocimiento.</h2>',
                    background: '#000000e9',
                    icon: 'warning',
                    width: '40%',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver al incio',
                    BackDrop: true,
                    allowEscapeKey : false,
                    allowOutsideClick: false,
                    allowSideClick: false,
                    allowEnterKey: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "./index.php";
                    }
                });
        exit();
        }
    }

    //hacer un array que vaya actualizando cada que se encuentré una pregunta correcta
    var verificarSituacion = null;

    function clickSituacion(id){
        if(eliminar == id){
            reproducirCorrecta();
            pausarMusicaDeFondo();
            Swal.fire({
                title: `¡Felicidades! Encontraste ${señalElemento[id]} <div style="position: absolute; width: 60px; height: 60px; right: 50px; top: 10px; background-size: cover; background-image: url(./img-elementos/suspicaz.png);"></div>`,
                color: 'white',
                html: `<div style="position: absolute; width: 300px; height: 300px; margin-left: -120px; margin-top: -320px;"> <h1 style="        
                display: flex;
                width: 200px;
                height: 200px;
                background-image: url(./img-elementos/logoVerde.png);
                background-size: cover;
                background-attachment: contain;
                background-position: center;"> 
                </h1> </div> <div style="font-family: Comic Sans MS; text-align: center;"> <h2>${respuestas[id]}</h2></div>`,
                icon: 'success',   
                background: 'rgba(52, 56, 56, 0.677)',             
                confirmButtonText: 'Siguiente',
                confirmButtonColor: 'Green',
                width: '40%',
                height: '800px',
                BackDrop: true,
                allowEscapeKey : false,
                allowOutsideClick: false,
                allowSideClick: false,
                allowEnterKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    reanudarMusicaDeFondo();
                    generarNumero();
                    setTimeout(() => {                
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
                            <div></h1>
                            <div style="position: absolute; width: 300px; height: 300px; margin-left: 660px; margin-top: 80px;"> <h1 style="        
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
                    }, 200);
                }
            })
        }else{
            reproducirIncorrecta();
            pausarMusicaDeFondo();
            reanudarMusicaDeFondo();
            verificarSituacion = 0;
            Swal.fire({
                title: '¡Ohhh no! ese no es el elemento o señal',
                text: 'Sigue intentando',
                icon: 'error',
                confirmButtonText: 'Intentalo de nuevo',
                width: '20%',
                height: '600px',
                background: 'black',             
                BackDrop: true,
                confirmButtonColor: 'green',
                allowEscapeKey : false,
                allowOutsideClick: false,
                allowSideClick: false,
                allowEnterKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                }
            })
        };
    }



// function clickSituacion(id){
//     if(eliminar[id] == id){
//         console.log(elementoEliminado[id]);
//          elementoEliminado[id].parentNode.removeChild(elementoEliminado[id]);          
//                  
//         Swal.fire({
//             title: '¡Eyy! Encontraste algo. <div style=" position: absolute; width: 60px; height: 60px; right: 150px; top: 10px; background-size: cover; background-image: url(./img-elementos/suspicaz.png);"></div>',
//             color: 'white',
//             html: `<div style="position: absolute; width: 300px; height: 300px; margin-left: -120px; margin-top: -360px;"> <h1 style="        
//             display: flex;
//             width: 200px;
//             height: 200px;
//             background-image: url(./img/logoVerde.png);
//             background-size: cover;
//             background-attachment: contain;
//             background-position: center;"> 
//             </h1> </div> <div style="font-family: Comic Sans MS; text-align: center;"> <h2>${respuestas[id]}</h2></div>`,
//             icon: 'success',   
//             background: 'rgba(52, 56, 56, 0.677)',             
//             confirmButtonText: 'Siguiente',
//             confirmButtonColor: 'Green',
//             width: '40%',
//             height: '800px',
//             BackDrop: true,
//             allowEscapeKey : false,
//             allowOutsideClick: false,
//             allowSideClick: false,
//             allowEnterKey: false,
//         });
//     }
// }



// AFRAME.registerComponent('shootable', {
// init: function () {
//     this.el.addEventListener('click', () => {
//         this.el.parentNode.removeChild(this.el)
//         Swal.fire({
//             title: `<h2 style="color: white;">¡Encontraste el riesgo!</h2>`,
//             background: 'rgba(52, 56, 56, 0.677)',
//             html: '<div style="font-family: Comic Sans MS; text-align: center;"> <h3 style="color: #efefef;">Señal de ruta de evacuación</h3>  </div> ',
//             icon: 'success',
//             width: '20%',
//             height: '600px',
//             BackDrop: true,
//             allowOutsideClick: false,
//             allowScapeKey: false,
//             allowEnterKey: false,
//         })
//     })
// }
// })




