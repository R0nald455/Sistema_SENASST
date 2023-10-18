const grid = document.querySelector('.grid');
const spanPlayer = document.querySelector('.player');
const timer = document.querySelector('.timer');
var indicador = null;

const characters = [
  'tipoA/alcohol',
  'tipoA/Bajalenguas',
  'tipoA/esparadrapo',
  'tipoA/gasaslimpias',
  'tipoA/Guanteslatex',
  'tipoA/solucionsalina',
  'tipoA/termometro',
  'tipoA/vandaelastica2x5',
  'tipoA/vandaelastica3x5',
  'tipoA/vandaelastica5x5',
  'tipoA/vendaalgodon3x5',
  'tipoA/yodopovidona',
];
console.log(characters.length);

const NombreRetroali = ["Alcohol","Bajalenguas","Esparadrapo","Gasas limpias","Guantes de latex","Solución salina","Termómetro","Venda elástica 2*5","Venda elástica 3*5","Venda elástica 5*5","Venda de algodón 3*5","Yodopovidona."];

const guardaImg = ['../images/tipoA/alcohol.png','../images/tipoA/Bajalenguas.png','../images/tipoA/esparadrapo.png','../images/tipoA/gasaslimpias.png','../images/tipoA/Guanteslatex.png','../images/tipoA/solucionsalina.png','../images/tipoA/termometro.png','../images/tipoA/vandaelastica2x5.png','../images/tipoA/vandaelastica3x5.png','../images/tipoA/vandaelastica5x5.png','../images/tipoA/vendaalgodon3x5.png','../images/tipoA/yodopovidona.png'];

const defEspa = "El esparadrapo es un elemento común que se encuentra en muchos botiquines de primeros auxilios y se utiliza para varios propósitos relacionados con el tratamiento de heridas y lesiones menores.<br><br> 1. Sujetar apósitos y vendajes: El esparadrapo se utiliza principalmente para sujetar apósitos, vendajes y gasas en su lugar sobre heridas o cortes. Ayuda a mantener los materiales de curación en su posición, evitando que se deslicen o se desprendan. <br> 2. Cierre de heridas pequeñas: En algunos casos, el esparadrapo quirúrgico o de sutura adhesiva puede utilizarse para cerrar heridas pequeñas y superficiales, como cortes limpios. <br> 3.Inmovilización temporal: Aunque no es su función principal, el esparadrapo puede usarse de manera temporal para inmovilizar fracturas o esguinces leves, especialmente en situaciones de emergencia hasta que se obtenga atención médica adecuada.";

const defGasas = "Las gasas limpias son un elemento esencial en los botiquines de primeros auxilios y tienen varias funciones importantes relacionadas con el tratamiento de heridas y lesiones menores. Algunas de las funciones clave de las gasas limpias en un botiquín son las siguientes: <br><br> 1. Limpieza de heridas: Las gasas limpias se utilizan para limpiar heridas y cortes antes de aplicar cualquier tipo de apósito o vendaje. <br> 2. Absorción de sangre y exudados: Las gasas son altamente absorbentes y se utilizan para absorber sangre, fluidos corporales y exudados de heridas o abrasiones. <br> 3. Protección de heridas: Se pueden usar gasas limpias como una capa protectora entre la herida y el apósito o vendaje, ayudando a evitar que el apósito se adhiera directamente a la herida. <br> 4. Aplicación de medicamentos tópicos: En algunos casos, las gasas limpias se empapan con medicamentos tópicos, como soluciones antisépticas o ungüentos antibióticos, antes de aplicarlas sobre la herida. <br> Prevención de infecciones: Al limpiar adecuadamente y proteger las heridas con gasas limpias, se reduce el riesgo de infección en las lesiones menores.";

const guantesLatex = "Los guantes de látex en los botiquines de primeros auxilios tienen una función esencial en la prevención de la contaminación y la protección tanto del auxiliador como del paciente en diversas situaciones médicas. Sus funciones principales son las siguientes: <br><br> 1. Protección contra la contaminación: Los guantes de látex son una barrera física que evita el contacto directo de las manos del auxiliador con fluidos corporales, sangre, secreciones, heridas o sustancias potencialmente contaminantes. <br> 2. Higiene y seguridad: Los guantes de látex garantizan un nivel básico de higiene y seguridad durante la atención médica o en situaciones de primeros auxilios. Ayudan a mantener las manos del auxiliador limpias y protegidas. <br> 3. Manipulación de heridas: Cuando se trata de heridas, cortes o abrasiones, los guantes de látex son esenciales para evitar la contaminación de la herida y para mantenerla limpia durante el proceso de curación. <br> 4. Protección de alergias: Aunque el látex puede causar alergias en algunas personas, su uso generalizado se ha reducido en favor de guantes de nitrilo o vinilo en entornos médicos. ";

const defSolucion = "La solución salina, que es una solución de agua y sal (cloruro de sodio), tiene varias funciones en un botiquín de primeros auxilios. Uso de la solución salina en el contexto de los botiquines: <br><br> 1. Lavado de heridas: La solución salina estéril se utiliza comúnmente para lavar heridas y cortes. Limpia la herida, ayuda a eliminar la suciedad, los desechos y los gérmenes, y puede reducir el riesgo de infección. Es una alternativa segura al agua del grifo, que puede contener impurezas. <br> 2.Irrigación de ojos: En caso de contaminación con partículas extrañas o productos químicos en los ojos, la solución salina se utiliza para irrigar y limpiar los ojos. Puede ayudar a enjuagar y eliminar sustancias irritantes o peligrosas. <br> 3. Enjuague bucal y garganta: La solución salina se puede utilizar como enjuague bucal o garganta en situaciones en las que es necesario limpiar o desinfectar temporalmente la boca o la garganta. <br> 4. Hidratación de apósitos: La solución salina puede mantener la humedad de apósitos y gasas en aplicaciones médicas, lo que es beneficioso para evitar que se sequen y se peguen a la piel o la herida. <br> 5. Rehidratación oral: En algunas situaciones de deshidratación leve o pérdida de líquidos debido a vómitos o diarrea, la solución salina oral (también conocida como solución de rehidratación oral) puede ser utilizada para restablecer los niveles de electrolitos y líquidos en el cuerpo.";

const defTermo = "Los termómetros son instrumentos médicos esenciales que a menudo se incluyen en los botiquines de primeros auxilios. Su función principal es medir la temperatura corporal de una persona. Esta información es valiosa para evaluar la salud de alguien, especialmente en situaciones donde se sospecha de fiebre o hipotermia. <br><br> 1. Detección de fiebre: Los termómetros permiten medir la temperatura corporal de una persona para determinar si tiene fiebre. La fiebre es una respuesta del cuerpo a infecciones u otras condiciones médicas, y puede ser un síntoma importante de enfermedad. Una temperatura corporal superior a la normal (generalmente 37°C o 98.6°F) puede indicar fiebre. <br> 2. Diagnóstico inicial: En situaciones de emergencia o primeros auxilios, como accidentes o lesiones graves, la medición de la temperatura puede proporcionar información importante sobre el estado de la persona. La fiebre o la hipotermia pueden complicar la atención médica y afectar el tratamiento adecuado. <br> 3. Toma de decisiones médicas: Los médicos y profesionales de la salud utilizan termómetros para tomar decisiones médicas informadas, como prescribir medicamentos o recomendar la atención adecuada, basándose en la temperatura corporal de un paciente.";

const defBan2x5 = "Las vendas 2x5, que generalmente se refieren a una venda de 2 pulgadas de ancho por 5 yardas de longitud (aproximadamente 4.5 cm de ancho por 4.6 metros de largo), son un componente común en los botiquines de primeros auxilios y tienen varias funciones importantes: <br><br> 1. Sujetar apósitos: Una de las funciones principales de una venda 2x5 es sujetar apósitos, gasas o almohadillas sobre heridas o cortes. Se envuelve alrededor de la herida para mantener los materiales de curación en su lugar de manera segura. <br> 2. Inmovilización temporal: Puede utilizarse para inmovilizar temporalmente una articulación lesionada o una extremidad en caso de esguinces o fracturas leves. Por ejemplo, se puede usar para crear una férula improvisada junto con materiales de soporte adicionales. <br> 3. Fijación de splints (ferulas): En situaciones donde se necesite inmovilizar una extremidad lesionada, la venda 2x5 se puede utilizar para fijar splints o ferulas temporales en su lugar. <br> 4. Protección contra ampollas: En actividades al aire libre o deportes que involucran fricción, como el senderismo o el ciclismo, se puede usar una venda para proteger áreas propensas a ampollas, como los talones o los dedos de los pies.";

const defBan3x5 = "Las vendas 3x5 (a veces escritas como 3 x 5 y también conocidas como apósitos adhesivos o apósitos estériles) son elementos comunes en los botiquines de primeros auxilios y tienen varias funciones importantes: <br><br> 1. Cubrir heridas y cortes: Las vendas 3x5 se utilizan para cubrir y proteger heridas, cortes o abrasiones en la piel. Ayudan a prevenir la contaminación de la herida y reducen el riesgo de infección al mantenerla limpia. <br> 2. Detener el sangrado: Si hay sangrado de una herida, las vendas 3x5 pueden aplicarse para aplicar presión directa sobre la zona afectada y ayudar a detener el sangrado. Esto es especialmente útil en situaciones en las que se necesita un control rápido del sangrado antes de buscar atención médica. <br> 3. Promover la cicatrización: Al mantener una herida limpia y protegida, las vendas 3x5 contribuyen a un ambiente propicio para la cicatrización de la piel. Ayudan a prevenir la contaminación de la herida por bacterias y otros patógenos.";

const defBan5x5 = "Las vendas de 5x5 centímetros (cm) son un tipo de vendaje que se encuentra comúnmente en los botiquines de primeros auxilios y se utilizan para diversas funciones en el tratamiento de heridas y lesiones menores. <br> 1. Presionar hemorragias: En caso de heridas con sangrado, las vendas de este tamaño pueden utilizarse para aplicar presión sobre la herida y detener el sangrado. Es importante hacerlo con cuidado y aplicar presión directa sobre la herida, pero evitando ejercer demasiada presión. <br> 2. Soporte para heridas y quemaduras: Si alguien tiene una herida o quemadura en una zona que requiere soporte o protección adicional, como los dedos, las manos o los pies, estas vendas pueden ser útiles para brindar ese soporte y evitar el movimiento excesivo. <br> 3. Envolver dedos o extremidades pequeñas: Las vendas de este tamaño son ideales para envolver y proteger dedos, manos, pies o cualquier otra extremidad pequeña lesionada.";

const defVendalgodon3x5 = "Las vendas de algodón son versátiles y esenciales en un botiquín de primeros auxilios, ya que pueden ser útiles en una variedad de situaciones médicas y lesiones menores. Sin embargo, es importante saber cómo aplicarlas correctamente y cuándo buscar atención médica profesional en caso de lesiones graves o complicadas. <br><br> 1. Protección de heridas: Las vendas de algodón se utilizan comúnmente para proteger heridas, cortes o abrasiones de la contaminación externa y para mantener un ambiente limpio y estéril alrededor de la herida. <br> 2. Presión y soporte: Las vendas de algodón se pueden usar para aplicar presión controlada sobre una herida que sangra levemente, lo que puede ayudar a detener el sangrado. También se pueden utilizar para proporcionar soporte a una articulación lesionada o para inmovilizar temporalmente una extremidad en caso de fractura o esguince leve. <br> 3. Vendaje compresivo: Las vendas de algodón se pueden usar en la técnica conocida como vendaje compresivo. Esto implica envolver una venda alrededor de una parte del cuerpo lesionada para reducir la hinchazón y controlar el sangrado. Es especialmente útil en casos de esguinces y contusiones.";

const defYodo = "Es importante seguir las instrucciones de uso de la yodopovidona y utilizarla con precaución, ya que puede causar irritación en algunas personas. Además, en caso de heridas graves o infecciones significativas, se debe buscar atención médica profesional en lugar de depender únicamente de la yodopovidona. <br><br> 1. Desinfección de heridas: La yodopovidona se utiliza para limpiar y desinfectar heridas menores, cortes y raspaduras. Ayuda a eliminar gérmenes, bacterias y otros patógenos que podrían causar infecciones en la herida. <br> 2. Limpieza de piel antes de cirugía: En entornos quirúrgicos, la yodopovidona se utiliza para desinfectar la piel del paciente y del personal médico antes de la cirugía. Ayuda a prevenir infecciones durante los procedimientos quirúrgicos. <br> 3. Tratamiento de quemaduras menores: En el caso de quemaduras menores, la yodopovidona puede utilizarse para limpiar y desinfectar la piel antes de aplicar apósitos o ungüentos para quemaduras. <br> 4. Prevención de infecciones cutáneas: La yodopovidona también se usa para prevenir infecciones cutáneas en personas propensas a ellas, como aquellas con úlceras o heridas crónicas. <br> 5. Desinfección de instrumentos médicos: En entornos médicos, la yodopovidona se utiliza para desinfectar instrumentos médicos y superficies antes de su uso, lo que ayuda a prevenir la transmisión de infecciones.";


const retroali = ["Este tipo de alcohol, que suele tener una concentración de aproximadamente el 70% de alcohol etílico (etanol), es efectivo para eliminar gérmenes, bacterias y algunos virus de la superficie de la piel o de objetos y herramientas médicas. Se utiliza comúnmente para:<br><br><br> 1. Limpiar la piel antes de inyectar medicamentos o realizar punciones venosas. <br>2. Desinfectar las manos de los profesionales de la salud antes de realizar procedimientos médicos. <br>3. Limpieza y desinfección de instrumentos médicos y equipos que entran en contacto con el paciente. <br>4. Desinfectar superficies en entornos médicos, como las mesas de examen o camillas. <br>5. Limpiar y desinfectar heridas pequeñas o cortes en el hogar como parte de los cuidados de primeros auxilios.","Los bajalenguas, también conocidos como depresores linguales o espátulas bucales, son instrumentos médicos de madera o plástico que se utilizan en entornos médicos y dentales para una variedad de propósitos. Estos son: <br><br><br> 1. Examen bucal y dental: Los bajalenguas se utilizan comúnmente para mantener la boca del paciente abierta durante el examen dental y bucal. <br>2. Aplicación de medicamentos tópicos: Los bajalenguas se utilizan para aplicar medicamentos tópicos en la boca, como anestésicos locales o gel para úlceras bucales. Esto ayuda a aliviar el dolor o el malestar oral. <br>3. Toma de muestras: Los bajalenguas se pueden usar para tomar muestras de la cavidad bucal, como raspados de la lengua o muestras de saliva, para pruebas de laboratorio o diagnóstico de enfermedades bucales. <br> ",defEspa,defGasas,guantesLatex,defSolucion,defTermo,defBan2x5,defBan3x5,defBan5x5,defVendalgodon3x5,defYodo];



const createElement = (tag, className) => {
  const element = document.createElement(tag);
  element.className = className;
  return element;
}

let firstCard = '';
let secondCard = '';

const checkEndGame = () => {
  const disabledCards = document.querySelectorAll('.disabled-card');

  if (disabledCards.length === 24) {

    //Poner alerta de que ha terminado el juego. 
    clearInterval(this.loop);
    alert(`¡Felicidades! Ha terminado el juego y su tiempo fue de: ${timer.innerHTML}`);
  }
}


const checkCards = () => {
  const firstCharacter = firstCard.getAttribute('data-character');
  const secondCharacter = secondCard.getAttribute('data-character');

  if (firstCharacter === secondCharacter) {

    firstCard.firstChild.classList.add('disabled-card');
    secondCard.firstChild.classList.add('disabled-card');

    firstCard = '';
    secondCard = '';

    indicador = characters.indexOf(firstCharacter);


    if (firstCharacter === characters[indicador]){
        Swal.fire({
            title: `<h1 style="display:flex; margin:auto; width: 200px; height: 200px;background-image: url(${guardaImg[indicador]});background-size: cover;background-attachment: contain;background-position: center;"></h1><h2 style="color:#9ee551;">${NombreRetroali[indicador]}</h2>`,
            html: `<div style="position: absolute; width: 150px; height: 300px;"> </h1></div><div style=" font-family: Comic Sans MS; text-align: left; color:white; font-size:20px; padding:1px;><h4 style="font-family: arial;">${retroali[indicador]}</h4></div>`,
            icon: 'info',
            confirmButtonColor: 'green',
            confirmButtonText: 'Aceptar',
            width: '80%',
            background: '#000000e9',
            BackDrop: true,
            allowEscapeKey : false,
            allowOutsideClick: false,
            allowEnterKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                checkEndGame();
            }
        });
    } 

  } else {
    setTimeout(() => {

      firstCard.classList.remove('reveal-card');
      secondCard.classList.remove('reveal-card');

      firstCard = '';
      secondCard = '';

    }, 500);
  }

}

const revealCard = ({ target }) => {

  if (target.parentNode.className.includes('reveal-card')) {
    return;
  }

  if (firstCard === '') {

    target.parentNode.classList.add('reveal-card');
    firstCard = target.parentNode;

  } else if (secondCard === '') {

    target.parentNode.classList.add('reveal-card');
    secondCard = target.parentNode;

    checkCards();
  }
}

const createCard = (character) => {

  
  const card = createElement('div', 'card');
  const front = createElement('div', 'face front');
  const back = createElement('div', 'face back');

  front.style.backgroundImage = `url('../images/${character}.png')`;

  card.appendChild(front);
  card.appendChild(back);

  card.addEventListener('click', revealCard);
  card.setAttribute('data-character', character)

  return card;
}

const loadGame = () => {
  const duplicateCharacters = [...characters, ...characters];

  const shuffledArray = duplicateCharacters.sort(() => Math.random() - 0.5);

  shuffledArray.forEach((character) => {
    const card = createCard(character);
    grid.appendChild(card);
  });
}

const startTimer = () => {

  this.loop = setInterval(() => {
    const currentTime = +timer.innerHTML;
    timer.innerHTML = currentTime + 1;
  }, 1000);

}

window.onload = () => {
  spanPlayer.innerHTML = localStorage.getItem('player');
  startTimer();
  loadGame();
}
