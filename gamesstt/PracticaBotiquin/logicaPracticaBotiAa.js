fichas = ["","","","","","","","","","","",""];
let comprobar = null;
var l = [];
var c=null;
var guardar = [];
var contar = 0;

const boton = document.getElementById('btn-salir');

// Agrega un escuchador de eventos click al botón
boton.addEventListener('click', function() {
    Swal.fire({
        title: `<h2 style="color: white;">¿Estás seguro que quieres salir?</h2>`,
        html: '<h2 style="color: white;"> ¡Perderás el progreso! </h2>',
        background: '#00000053',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, quiero salir',
        cancelButtonText: 'Cancelar',
        BackDrop: true,
        allowEscapeKey : false,
        allowOutsideClick: false,
        allowSideClick: false,
        allowEnterKey: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = './index.php';
        }
    })
});


//Mostrarlos de forma aleatoria y que se terminé;
function insertarEn(array,valor,posición){
    var inicio=array.slice(0,posición)
	var medio=valor
	var fin=array.slice(posición)
	var resultado=inicio.concat(medio).concat(fin)
	return resultado
}

function aleatoriosNoRepetidos(cantidad){
    var array=[]
	for(var i=0;i<cantidad;i++){
        array=insertarEn(array,i,Math.random()*(cantidad+1) )
	}
	return array
}


l=aleatoriosNoRepetidos(24); //Pasamos el parámetro de los números que necesitamos.
var eliminar = 0;

// Función para generar la ficha correspondiente.

function noPertenece(){
    document.getElementById("btn-g").style.display = "inline-block";
    document.getElementById("btn-n").style.display = "none";
    document.getElementById("z" + eliminar).style.display = "none";
    document.getElementById("c" + eliminar).style.display = "none"; // Muestra el elemento de la ficha correspondiente.
}



function GenerarFicha(){ 
    
    /*Guarda en esta varibale (Eliminar) los números aleatorios y, la variable contar hace referencia a el indice 0, ya que vale 0 la variable*/
    eliminar = (l[contar]); 

    console.log(eliminar);
    console.log(l);

    // Instrucción para cuando la variable dónde se guardo el arreglo de los números, queda vacía.
    if(eliminar == undefined){
        Swal.fire({
            title: `<h2 style="color: white;">Se han terminado todas las fichas.</h2>`,
            html: '<h2 style="color: white;"> No te preocupes, puedes intentarlo de nuevo o salir del juego.</h2>',
            background: 'black',
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Intentar de nuevo',
            cancelButtonText: 'Juego anterior',
            BackDrop: true,
            allowEscapeKey : false,
            allowOutsideClick: false,
            allowSideClick: false,
            allowEnterKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceso que se ejecuta al hacer clic en Aceptar
                location.reload();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Proceso que se ejecuta al hacer clic en Cancelar
                window.location.href = "./index.php";
            }
        });
    }

    // Recorrido para buscar los números de las fichas que ya han sido mostradas y luego las selecciona con la función de index.Of.
    for(var j=0; j<l.length; j++){
        if(l[j] == eliminar){
            var indicador = l.indexOf(l[j]);
        }
    }
    // Instrucción para eliminar el número de la ficha que seleccionó anteriormente en el recorrido.
    if (indicador > -1){
        l.splice(indicador, 1); //Elimina el número con la función de splice.
    }

    document.getElementById("c" + eliminar).style.display = "flex"; // Muestra el elemento de la ficha correspondiente.
    document.getElementById("z" + eliminar).style.display = "flex"; // Muestra el resultado o significado de la ficha correspondiente.

    document.getElementById("btn-g").style.display = "none"; // Esconder el botón para que no se puede generar más de una vez.
    document.getElementById("btn-n").style.display = "inline-block"; // Esconder el botón para que no se puede generar más de una vez.

    console.log(l);
    console.log("z" + eliminar);
}

// Función para que sea permitido insertar algo aquí
function allowDrop(ev) {
    ev.preventDefault();
}

// Función para que sea arrastrable el elemento que vamos a insertar arriba e iniciar un arratar con draggable.
function dragStart(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function dragDrop(ev) {
    
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    fichas[parseInt(ev.target.id)] = data;
    ev.target.appendChild(document.getElementById(data));

    console.log(data);

    
    if(data == data){
        document.getElementById("btn-g").style.display = "inline-block";
        document.getElementById("z" + eliminar).style.display = "none";
        document.getElementById("btn-n").style.display = "none";
    } 
}


// Función para comprobar cuando haya terminado de acomodar todo.




function Comprobar(){
    
    for(var i=0; i<fichas.length; i++){
        if (fichas[i]== ''){
            comprobar = 1;
        } else {
            comprobar = 2;
        }
    }

    console.log(fichas);
    
    if(comprobar == 1){
        
        Swal.fire({
            title: 'Debes acomodar todas la fichas en su lugar',
            icon: 'error',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: 'red',
            BackDrop: true,
        })
        
        
    } else {
        fichas.sort();
        if(fichas[0] == "c0" && fichas [1] == "c1" && fichas[2] == "c10" && fichas[3] == "c11" && fichas[4] == "c2" && fichas[5] == "c3" && fichas[6] == "c4" && fichas[7] == "c5" && fichas[8] == "c6" && fichas[9] == "c7" && fichas[10] == "c8" && fichas[11] == "c9")
        {
            Swal.fire({
                title: `<h2 style="color: white;">Los elementos que has colocado son correctos. ¡Felicidades!</h2>`,
                html: '<h2 style="color: white;"> Ya conoces los elementos que tiene el botiquín tipo A. Esto te permitirá saber cuál debes usar en ocasiones de emergencia, pues saber que hay dentro te ahorrará tiempo para resolver la emergencia en el menor tiempo posible.</h2>',
                background: 'black',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar',
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

        } else {
            Swal.fire({
                title: `<h2 style="color: white;">Los elemntos no son correctos para el botiquín tipo A.</h2>`,
                html: '<h2 style="color: white;"> No te preocupes, puedes estudiar un poco más en el anterior juego, o intentarlo de nuevo.</h2>',
                background: 'black',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Intentar de nuevo',
                cancelButtonText: 'Juego anterior',
                BackDrop: true,
                allowEscapeKey : false,
                allowOutsideClick: false,
                allowSideClick: false,
                allowEnterKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceso que se ejecuta al hacer clic en Aceptar
                    location.reload();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Proceso que se ejecuta al hacer clic en Cancelar
                    window.location.href = "./index.php";
                }
            });
        }
    }
}

