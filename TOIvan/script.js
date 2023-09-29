function cargarRiesgo() {
    var array = ["Fisico", "Quimico", "Biologicos", "Psicosociales", "Seguridad", "Naturales","Biomecanicos"];
    array.sort();
    addOptions("riesgo", array);
}


//Función para agregar opciones a un <select>.
function addOptions(domElement, array) {
    var selector = document.getElementsByName(domElement)[0];
    for (riesgo in array) {
        var opcion = document.createElement("option");
        opcion.text = array[riesgo];
        // Añadimos un value a los option para hacer mas facil escoger los pueblos
        opcion.value = array[riesgo].toLowerCase()
        selector.add(opcion);
    }
}



function cargarCondicion() {
    // Objeto de provincias con pueblos
    var listaCondicion = {
      fisico: ["Ruido", "Vibraciones", "Temperaturas extremas", "Radiaciones", "Iluminación inadecuada","Presion Atmosferica"],
      naturales: ["Sismo", "Terremoto", "Vendaval","Inundacion","Incendios","Precipitaciones"],
      quimico: ["Polvos Organicos-Inorganicos", "Gases y vapores", "Material pariculado","Humos","Liquidos","Niebla"],
      biologicos: ["Virus ", "Bacterias","Hongos","Parasitos","Picaduras","Mordeduras","Fluidos"],
      seguridad: ["Mecanico", "Eletrico", "Locativo","Tecnologico","Accidentes de trasinsito","Publicos (Robos, Atentados ...)","Trabajo en alturas","Espacios confinados"],
      biomecanicos: ["Postura", "Esfuerzo","Movimiento Repetitivo","Material Particulado"],
      psicosociales: ["Gestion Organizacional", "Organización del trabajo", "Carateristicas del grupo de trabajo","Interfase de Persona","Jornada de trabajo"]
    }
    
    var riesgos = document.getElementById('riesgo')
    var condiciones = document.getElementById('condicion')
    var riesgoSeleccionada = riesgos.value
    
    // Se limpian los pueblos
    condiciones.innerHTML = '<option value="">Seleccione un Tipo...</option>'
    
    if(riesgoSeleccionada !== ''){
      // Se seleccionan los pueblos y se ordenan
      riesgoSeleccionada = listaCondicion[riesgoSeleccionada]
      riesgoSeleccionada.sort()
    
      // Insertamos los pueblos
      riesgoSeleccionada.forEach(function(condicion){
        let opcion = document.createElement('option')
        opcion.value = condicion
        opcion.text = condicion
        condiciones.add(opcion)
      });
    }
    
  }
  
 // Iniciar la carga de provincias solo para comprobar que funciona
cargarRiesgo();

function showContent() {
    element = document.getElementById("condicion");
    check = document.getElementById("riesgo");
    if (check.checked) {
        element.style.display='block';
    }
    else {
        element.style.display='block';
    }
}