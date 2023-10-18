function mostrarOpcion(){

    var opcion = document.getElementById("selectOpcionEnun").value;
    document.getElementById("cont-archivo").style.display = "none";

    if (opcion === "img"){
        console.log("Entro en la imagen")
        document.getElementById("cont-archivo").style.display = "flex";
    } else if (opcion === "video"){
        console.log("Entro en el video")
        document.getElementById("cont-archivo").style.display = "flex";
    } else if (opcion === "audio"){
        console.log("Entro en audio")
        document.getElementById("cont-archivo").style.display = "flex";
    } else if (opcion === "text"){
        console.log("Entro en el texto")
        document.getElementById("cont-archivo").style.display = "none";
    }
};

// Función para guardar el valor seleccionado en localStorage
function guardarValorSeleccionado() {
    var selectElement = document.getElementById('selectPrueba');
    var valorSeleccionado = selectElement.value;

    // Guardar el valor seleccionado en localStorage
    localStorage.setItem('valorSeleccionado', valorSeleccionado);
}

// Función para cargar el valor seleccionado desde localStorage
function cargarValorSeleccionado() {
    var selectElement = document.getElementById('selectPrueba');
    var valorGuardado = localStorage.getItem('valorSeleccionado');

    // Establecer el valor guardado como la opción seleccionada en el select
    if (valorGuardado !== null) {
        selectElement.value = valorGuardado;
    }
}

function guardarValorSeleccionadoDos() {
    var selectElementt = document.getElementById('selectPruebaR');
    var valorSeleccionadoDos = selectElementt.value;

    // Guardar el valor seleccionado en localStorage
    localStorage.setItem('valorSeleccionados', valorSeleccionadoDos);
}

// Función para cargar el valor seleccionado desde localStorage
function cargarValorSeleccionadoDos() {
    var selectElement = document.getElementById('selectPruebaR');
    var valorGuardadoDos = localStorage.getItem('valorSeleccionados');

    // Establecer el valor guardado como la opción seleccionada en el select
    if (valorGuardadoDos !== null) {
        selectElement.value = valorGuardadoDos;
    }
}


// Llamar a la función de carga al cargar la página
cargarValorSeleccionado();
cargarValorSeleccionadoDos();

// Evento que se dispara cuando la página ha terminado de cargar
window.addEventListener('load', function () {
// Verifica si hay una posición guardada en la sessionStorage
if (sessionStorage.getItem('scrollPosition')) {
        // Obtiene la posición guardada en la sessionStorage
        const scrollPosition = sessionStorage.getItem('scrollPosition');
        // Hace scroll hasta la posición guardada
        window.scrollTo(0, scrollPosition);
    }

    // Evento que se dispara antes de recargar la página
    window.addEventListener('beforeunload', function () {
        // Guarda la posición actual en la sessionStorage
        sessionStorage.setItem('scrollPosition', window.scrollY);
    });
});




document.getElementById("selectABCD").value;


// // Función para traer datos simulada
// function traerDatos() {
//     // Aquí puedes realizar cualquier operación para traer los datos
//     // Simularemos una demora de 2 segundos usando setTimeout
//     setTimeout(function() {
//         // Al finalizar la operación, cargamos nuevamente el valor seleccionado
//         cargarValorSeleccionado();
//         alert("Datos traídos correctamente.");
//     }, 2000); // 2000 milisegundos = 2 segundos
// }



// function recargar(){
//     location.reload();
// }