//Definimos todas las variables
var preguntas = ["Si rota ha de estar, mejor no te intentes sentar","Cuando conectes algo, revisa antes que esté en buen estado.","Si en una pared una grieta ves, ten precaución porque se puede romper.", "Cuando a clase debas entregar, asegurate de comida no ingresar, pues un riesgo o daño a los equipos puedes causar.","Cuando tengas sed y algo quieras beber, lejos de lo electrónico lo puedes hacer, porque un daño eléctrico puede suceder.", "Sentarse correctamente es primordial, porque una lesión postural puedes presentar.","Si un charco ves al pasar, ten cuidado no lo vayas a pisar."];
const scoreSpan = document.querySelector('#scoreSpan');
const cSpan = document.querySelector('#correctaSpan');
const inSpan = document.querySelector('#incorrectaSpan');
const soundCorrect = document.getElementById("correct");
const soundIncorrect = document.getElementById("error");
const backgroundMusic = document.getElementById('backgroundMusic');
var verificarSituacion = null;
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

l=aleatoriosNoRepetidos(6); //Pasamos el parámetro de los números que necesitamos.

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
                console.log(l)
            }
        }
        // Instrucción para eliminar el número de la ficha que seleccionó anteriormente en el recorrido.
        if (indicador > -1){
            l.splice(indicador, 1); //Elimina el número con la función de splice.
        }   

        if(eliminar == undefined){ 
            pausarMusicaDeFondo();
            Swal.fire({
                title: "Resultados del juego",
                html: `<div><p>Puntaje: ${resultado}</p> <p>Buenas: ${resultadoC}</p> <p>Incorrectas: ${resultadoIn}</p></div>`,
                icon: 'success',
                width: '20%',
                confirmButtonText: 'Mostrar resultados',
                height: '600px',
                BackDrop: true,
                allowOutsideClick: false,
                allowScapeKey: false,
                allowEnterKey: false,
            });
        exit();
        }
    }

    //hacer un array que vaya actualizando cada que se encuentré una pregunta correcta

    function clickSituacion(id){
        if(eliminar == id){
            verificarSituacion = 1;
            reproducirCorrecta();
            Swal.fire({
                title: '¡Encontraste el riego!',
                text: 'Felicidades',
                icon: 'success',
                width: '20%',
                height: '600px',
                BackDrop: true,
                allowOutsideClick: false,
                allowScapeKey: false,
                allowEnterKey: false,
            })
        }else{
            verificarSituacion = 0;
            reproducirIncorrecta();
            Swal.fire({
                title: '¡Ohhh no, ese no es el riesgo :(!',
                text: 'Sigue intentando',
                icon: 'error',
                confirmButtonText: 'Intentarlo de nuevo',
                width: '20%',
                height: '600px',
                BackDrop: true,
                allowOutsideClick: false,
                allowScapeKey: false,
                allowEnterKey: false,
            })
        };

        //Aumentar el puntaje
        function updateScore(){
            scoreSpan.innerHTML = "";
            resultado++;
            scoreSpan.innerHTML = resultado;
        };

        //Decrementar el puntaje
        function deleteScore(){
            scoreSpan.innerHTML = "";
            resultado--;
            scoreSpan.innerHTML = resultado;
        };

        //Aumentar preguntas correctas
        function aumentarCorrectas(){
            correctaSpan.innerHTML = "";
            resultadoC++;
            correctaSpan.innerHTML = resultadoC;
        };

        //Aumentar preguntas incorrectas
        function aumentarIncorrectas(){
            incorrectaSpan.innerHTML = "";
            resultadoIn++;
            incorrectaSpan.innerHTML = resultadoIn;
        };

        //Verifica la situación y en vase a eso, sigue generando alertas hasta que ya no se pueda más 
        if(verificarSituacion == 1){
            updateScore();
            aumentarCorrectas();
            generarNumero();

            setTimeout(() => {                
                Swal.fire({
                    title: 'Acertijo',
                    color: 'white',
                    html: `<div style="position: absolute; width: 300px; height: 300px; margin-left: -120px; margin-top: -302px;"> <h1 style="        
                    display: flex;
                    width: 200px;
                    height: 200px;
                    background-image: url(./img-riesgos/logoVerde.png);
                    background-size: cover;
                    background-attachment: contain;
                    background-position: center;"> 
                    </h1> </div> <div style="font-family: Comic Sans MS; text-align: center;"> <h2 style="color: yellowgreen"> ${preguntas[eliminar]} </h2> </div>`,
                    icon: 'question',   
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
                });
            }, 2900);

            console.log("Div con chulito");
        }else if(verificarSituacion == 0){
            deleteScore();
            aumentarIncorrectas();
            console.log("Div con error");
        };

    }