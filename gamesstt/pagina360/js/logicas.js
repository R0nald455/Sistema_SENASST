
const eliminar = [0,1,2,3,4,5];
const elementoAEliminar = document.getElementById("elemento1");
const elementoAEliminar2 = document.getElementById("elemento2");

const elementoEliminado = [elementoAEliminar, elementoAEliminar2];

const respuestas = ['¡Felicidades!, encontraste una señal de ruta de evacuación que indica el camino (ruta) que debes de tomar en caso de que sea necesario evacuar.','Encontraste un contenedor de basura gris y podrías preguntarte si está relacionado con SST, y... sí, claro que lo está, debes ubicar los residuos dependiendo del tipo de contenedor para que no hayan riesgos de contaminación.']


function clickSituacion(id){
    if(eliminar[id] == id){
        console.log(elementoEliminado[id]);
        elementoEliminado[id].parentNode.removeChild(elementoEliminado[id]);          
        Swal.fire({
            title: '¡Eyy! Encontraste algo. <div style=" position: absolute; width: 60px; height: 60px; right: 150px; top: 10px; background-size: cover; background-image: url(./img-elementos/suspicaz.png);"></div>',
            color: 'white',
            html: `<div style="position: absolute; width: 300px; height: 300px; margin-left: -120px; margin-top: -360px;"> <h1 style="        
            display: flex;
            width: 200px;
            height: 200px;
            background-image: url(./img/logoVerde.png);
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
        });
    }
}



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




