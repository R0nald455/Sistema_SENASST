const grid = document.querySelector('.grid');
const spanPlayer = document.querySelector('.player');
const timer = document.querySelector('.timer');
var indicador = null;

const characters = [
  'tipoB/acetaminofen',
  'tipoB/asa',
  'tipoB/bajalenguas',
  'tipoB/clorohexidia',
  'tipoB/collarcervical',
  'tipoB/collarcervicalniño',
  'tipoB/compresas',
  'tipoB/esparadrapo',
  'tipoB/estetoscopio',
  'tipoB/gasaesteril',
  'tipoB/gasaslimpias',
  'tipoB/hidroxidoaluminio',
  'tipoB/inmovilizadores',
  'tipoB/linterna',
  'tipoB/mascararcp',
  'tipoB/pilas',
  'tipoB/solucionsalina',
  'tipoB/tablaespinal',
  'tipoB/tensiometro',
  'tipoB/tijeras',
  'tipoB/vandaelastica2x5',
  'tipoB/vandaelastica3x5',
  'tipoB/vandaelastica5x5',
  'tipoB/vaso',
  'tipoB/vendaalgodon5x5',
];

console.log(characters.length);

const NombreRetroali = ["Acetaminofen","Asa","Bajalenguas","Clorohexidia","Collar cervical","Collar cervical para niño","Compresas","Esparadrapo","Estetocopio","Gasas esteriles","Gasas limpias","Hidroxido de aluminio","Inmovilizadores","Linterna","Mascara","Pilas","Solucion salina","Tabla espinal","Tensiometro","Tijeras","Vanda elástica 2*5","Vanda elástica 3*5","Vanda elástica 5*5","Vaso desechable","Venda de algondon 5*5"];

const guardaImg = ['../images/tipoB/acetaminofen.png','../images/tipoB/asa.png','../images/tipoB/bajalenguas.png','../images/tipoB/clorohexidia.png','../images/tipoB/collarcervical.png','../images/tipoB/collarcervicalniño.png','../images/tipoB/compresas.png','../images/tipoB/esparadrapo.png','../images/tipoB/estetoscopio.png','../images/tipoB/gasaesteril.png','../images/tipoB/gasaslimpias.png','../images/tipoB/hidroxidoaluminio.png','../images/tipoB/inmovilizadores.png','../images/tipoB/linterna.png','../images/tipoB/mascararcp.png','../images/tipoB/pilas.png'
,'../images/tipoB/solucionsalina.png','../images/tipoB/tablaespinal.png','../images/tipoB/tensiometro.png','../images/tipoB/tijeras.png','../images/tipoB/vandaelastica2x5.png','../images/tipoB/vandaelastica3x5.png','../images/tipoB/vandaelastica5x5.png','../images/tipoB/vaso.png','../images/tipoB/vendaalgodon5x5.png'];

const defAcetaminofen = "El acetaminofén, también conocido como paracetamol en algunos países, es un medicamento analgésico y antipirético ampliamente utilizado. Se utiliza para aliviar el dolor y reducir la fiebre. A continuación, te explico sus principales usos y propiedades:<br><br> Alivio del dolor: El acetaminofén es eficaz para reducir el dolor leve a moderado. Se utiliza comúnmente para tratar dolores de cabeza, migrañas, dolores musculares, dolores de dientes, dolores menstruales y otros tipos de molestias. <br> <br> Reducción de la fiebre: El acetaminofén también actúa como antipirético, lo que significa que puede reducir la fiebre. Se utiliza para controlar la fiebre causada por infecciones, como el resfriado común o la gripe, así como otras condiciones médicas.";

const defAsa = "El Ácido Acetilsalicílico (ASA), más comúnmente conocido por su nombre comercial, la aspirina, es un medicamento ampliamente utilizado que pertenece a la clase de los antiinflamatorios no esteroides (AINEs). Tiene varias aplicaciones médicas y se utiliza principalmente para los siguientes propósitos: <br><br> Analgésico: El ASA se utiliza para aliviar el dolor leve a moderado. Es efectivo en el alivio del dolor causado por diversas afecciones, como dolores de cabeza, migrañas, dolores musculares, dolores de dientes, dolores menstruales y otros tipos de molestias.<br><br> Antipirético: El ASA se usa para reducir la fiebre en personas con fiebre alta o moderada. Ayuda a normalizar la temperatura corporal en casos de fiebre causada por infecciones u otras condiciones médicas. <br><br> Antiinflamatorio: Aunque su efecto antiinflamatorio es menos potente en comparación con otros AINEs como el ibuprofeno o el naproxeno, el ASA también tiene cierta capacidad para reducir la inflamación. Se utiliza en afecciones en las que la inflamación está presente, como la artritis reumatoide. <br><br> Prevención de enfermedades cardiovasculares: En dosis más bajas, el ASA se utiliza como una terapia preventiva para reducir el riesgo de enfermedades cardiovasculares, como ataques cardíacos y accidentes cerebrovasculares, en personas con factores de riesgo, como antecedentes familiares o enfermedades cardíacas previas.";

const defBajalenguas = "Los bajalenguas son pequeñas palas planas y delgadas hechas generalmente de madera, plástico o metal. Tienen una forma plana en un extremo que se utiliza para mantener la lengua del paciente de manera segura y cómoda mientras se realiza un examen médico de la boca y la garganta.<br><br> Los bajalenguas tienen varias aplicaciones médicas, entre las que se incluyen: <br><br> Exámenes bucales y de garganta: Los profesionales de la salud, como médicos, dentistas y enfermeros, utilizan los bajalenguas para mantener la lengua del paciente fuera del camino y poder examinar la boca y la garganta en busca de problemas médicos, infecciones, inflamaciones, úlceras, amígdalas inflamadas, abscesos, tumores y otras afecciones. <br><br> Toma de muestras: En algunos casos, los bajalenguas se utilizan para tomar muestras de tejido de la boca o la garganta, como muestras de mucosa, para su posterior análisis en un laboratorio. Esto es común en pruebas diagnósticas o investigaciones médicas. <br><br> Procedimientos médicos: Durante ciertos procedimientos médicos, como la intubación endotraqueal, la anestesia local o la cirugía oral, los bajalenguas pueden utilizarse para mantener la lengua fuera del camino y facilitar el acceso a la garganta o la boca del paciente.";

const defClorohexidia = "La clorhexidina es un químico antimicrobiano eficaz que pertenece a la clase de los desinfectantes y antisépticos. Está disponible en diversas formulaciones, como soluciones líquidas, geles, jabones, champús, enjuagues bucales y productos tópicos, y se utiliza en una variedad de aplicaciones médicas y de atención médica.<br> La clorhexidina se utiliza en una serie de contextos para prevenir infecciones y reducir la proliferación de microorganismos patógenos. Sus principales aplicaciones incluyen: <br><br> Higiene bucal: La clorhexidina se utiliza en enjuagues bucales y pastas dentales para reducir la placa bacteriana, prevenir la gingivitis y ayudar a mantener una buena higiene oral. Es especialmente útil en personas con problemas de encías o después de procedimientos dentales.<br><br> Preparación de la piel antes de cirugía: Antes de una cirugía, la piel del paciente y la del personal médico se pueden desinfectar con soluciones de clorhexidina para reducir el riesgo de infección en el sitio quirúrgico. <br><br> Cuidado de heridas: En algunos casos, la clorhexidina se usa para limpiar heridas y quemaduras, ayudando a prevenir la infección y promoviendo la cicatrización.<br><br> Control de infecciones en hospitales: En entornos hospitalarios, la clorhexidina se utiliza para desinfectar equipos médicos, superficies y manos del personal médico. Ayuda a prevenir la propagación de infecciones nosocomiales (infecciones adquiridas en el hospital). <br><br> Cuidado de la piel: En el cuidado de la piel, la clorhexidina se puede encontrar en productos como jabones y geles para ayudar a controlar problemas de la piel como el acné, la dermatitis seborreica y la foliculitis.";

const defCollarCervical = "Un collar cervical es una estructura que rodea el cuello y se ajusta de manera cómoda alrededor de él. Viene en diferentes tamaños y tipos, desde collares rígidos que no permiten ningún movimiento del cuello hasta collares más flexibles que permiten cierto grado de movimiento.<br> El collar cervical tiene varias aplicaciones médicas y terapéuticas, que incluyen: <br><br> nmovilización después de lesiones cervicales: Después de un accidente automovilístico, una caída o cualquier otro tipo de lesión que afecte la columna cervical, un collar cervical puede ser utilizado para inmovilizar la zona del cuello y prevenir movimientos que podrían agravar la lesión. Esto ayuda a estabilizar la columna cervical y reduce el riesgo de daño adicional a la médula espinal.<br><br> Tratamiento de afecciones médicas: En algunas condiciones médicas, como fracturas vertebrales, espondilosis cervical, hernias de disco cervicales o ciertas enfermedades neuromusculares, un collar cervical puede ser recetado para aliviar el dolor y reducir la presión sobre las estructuras cervicales. <br><br> Recuperación postoperatoria: Después de ciertas cirugías en la columna cervical, como la fusión vertebral, el collar cervical puede ser parte del tratamiento postoperatorio para mantener la alineación adecuada de la columna y permitir una recuperación segura. <br><br> Soporte durante la rehabilitación: En algunos casos, se utiliza un collar cervical durante la fase inicial de la rehabilitación para ayudar al paciente a mantener una postura adecuada y prevenir movimientos bruscos del cuello.";

const defCollarCervicalNiño = "Un collar cervical para niños es un dispositivo médico que rodea el cuello del niño y se ajusta de manera cómoda para proporcionar soporte y restricción de movimiento en la zona cervical. Está disponible en diferentes tamaños y tipos, y suele estar hecho de materiales acolchados y flexibles que son adecuados para el cuerpo en desarrollo de un niño.<br>El collar cervical para niños se utiliza en varias situaciones médicas y terapéuticas, que incluyen:<br><br>Lesiones cervicales: Después de un accidente o una lesión que afecta la columna cervical de un niño, como una caída, un traumatismo o una lesión deportiva, un collar cervical puede ser utilizado para inmovilizar el cuello y prevenir movimientos que podrían agravar la lesión. Esto ayuda a estabilizar la columna cervical y reduce el riesgo de daño adicional a la médula espinal.<br><br>Tratamiento de afecciones médicas: En algunas afecciones médicas que afectan la columna cervical de un niño, como fracturas vertebrales, escoliosis cervical, o ciertas enfermedades neuromusculares, un collar cervical puede ser recetado por un médico para aliviar el dolor y proporcionar soporte adicional.<br><br>Recuperación postoperatoria: Después de cirugías en la columna cervical de un niño, como la corrección de escoliosis, un collar cervical puede ser parte del tratamiento postoperatorio para mantener la alineación adecuada de la columna y permitir una recuperación segura.<br><br>Rehabilitación: En algunos casos, durante la rehabilitación de una lesión cervical, un collar cervical puede ser utilizado para ayudar al niño a mantener una postura adecuada y prevenir movimientos bruscos del cuello.";

const defCompresas = "Las compresas son dispositivos que constan de una capa exterior suave y a menudo impermeable, y una capa interna que contiene un material absorbente, como gel, arroz, semillas de lino o un relleno similar. Pueden tener diferentes formas y tamaños, y se pueden calentar en un microondas o enfriar en el congelador antes de aplicarlas en el cuerpo.<br>Las compresas tienen una variedad de usos en la atención médica y el autocuidado, y sus aplicaciones más comunes incluyen:<br><br>Alivio del dolor: Las compresas calientes se utilizan para aliviar el dolor muscular, dolores menstruales, calambres abdominales, dolores de espalda y otros tipos de molestias. El calor ayuda a relajar los músculos y a aumentar el flujo sanguíneo, lo que puede aliviar el dolor.<br><br>Reducción de la inflamación: Las compresas frías se aplican en áreas inflamadas o lesionadas para reducir la hinchazón y el dolor. El frío reduce el flujo sanguíneo en la zona, lo que puede disminuir la inflamación y el edema.<br><br>Terapia de lesiones: Las compresas frías se utilizan comúnmente en el tratamiento de lesiones deportivas, como torceduras, esguinces y contusiones. También pueden ser útiles después de una cirugía para reducir la inflamación y el dolor.<br><br>Migrañas y dolores de cabeza: Las compresas frías en la frente o la nuca pueden ayudar a aliviar los dolores de cabeza, incluyendo las migrañas, al reducir la dilatación de los vasos sanguíneos en la cabeza.<br><br>Cólicos en bebés: Las compresas tibias se utilizan a menudo para aliviar los cólicos en bebés, proporcionando calor en el área abdominal.";

const defEsparadrapo = "El esparadrapo es un elemento común que se encuentra en muchos botiquines de primeros auxilios y se utiliza para varios propósitos relacionados con el tratamiento de heridas y lesiones menores.<br><br> 1. Sujetar apósitos y vendajes: El esparadrapo se utiliza principalmente para sujetar apósitos, vendajes y gasas en su lugar sobre heridas o cortes. Ayuda a mantener los materiales de curación en su posición, evitando que se deslicen o se desprendan. <br> 2. Cierre de heridas pequeñas: En algunos casos, el esparadrapo quirúrgico o de sutura adhesiva puede utilizarse para cerrar heridas pequeñas y superficiales, como cortes limpios. <br> 3.Inmovilización temporal: Aunque no es su función principal, el esparadrapo puede usarse de manera temporal para inmovilizar fracturas o esguinces leves, especialmente en situaciones de emergencia hasta que se obtenga atención médica adecuada.";

const defEstetoscopio = "Un estetoscopio es un dispositivo médico utilizado por profesionales de la salud, como médicos, enfermeros, paramédicos y otros especialistas médicos, para escuchar los sonidos internos del cuerpo humano, especialmente los sonidos del corazón, los pulmones y el sistema vascular. Su diseño y funcionamiento permiten amplificar y transmitir los sonidos internos del cuerpo a los oídos del profesional de la salud, lo que facilita la evaluación y el diagnóstico de problemas médicos<br>El estetoscopio tiene varios propósitos en la práctica médica y clínica:<br><br>Escuchar los sonidos del corazón: Un estetoscopio permite escuchar los latidos del corazón, los soplos cardíacos, los sonidos de las válvulas cardíacas y otros ruidos relacionados con la actividad cardíaca. Esto es esencial para evaluar la salud cardíaca y diagnosticar afecciones cardíacas.<br><br>Escuchar los sonidos pulmonares: Los profesionales de la salud utilizan el estetoscopio para escuchar los sonidos respiratorios, como la respiración normal, los crepitantes (sonidos de burbujeo) que pueden indicar problemas pulmonares, sibilancias en casos de asma, y otros ruidos respiratorios anormales.<br><br>Evaluar el sistema vascular: Los sonidos del flujo sanguíneo en arterias y venas, conocidos como ruidos vasculares, también se pueden escuchar con un estetoscopio. Esto es útil para detectar problemas en el flujo sanguíneo y evaluar el estado de las arterias y venas.<br><br>Diagnosticar y monitorear: Un estetoscopio es una herramienta fundamental en el diagnóstico y el seguimiento de una amplia variedad de afecciones médicas, desde problemas cardíacos y pulmonares hasta trastornos gastrointestinales y vasculares.";

const defGasaEsteril = "Las gasas estériles son paños o tejidos de algodón limpios y sin contaminación que se han sometido a un proceso de esterilización, generalmente utilizando calor, vapor o radiación, para eliminar cualquier bacteria, virus u otros microorganismos. Este proceso asegura que las gasas estén libres de patógenos y sean seguras para su uso en procedimientos médicos y curas.<br>Las gasas estériles tienen una variedad de usos en la atención médica, que incluyen:<br><br>Cubrir heridas: Se utilizan para limpiar y cubrir heridas en la piel, protegiéndolas de la contaminación y promoviendo la cicatrización.<br><br>Absorber líquidos: Las gasas estériles son altamente absorbentes y se usan para absorber sangre, exudados u otros líquidos durante procedimientos quirúrgicos, curas o después de cirugías.<br><br>Limpieza de heridas: Se utilizan para limpiar cuidadosamente heridas antes de aplicar un vendaje o una crema antimicrobiana.<br><br>Protección de incisiones: Después de ciertas cirugías, las gasas estériles se pueden colocar sobre la incisión quirúrgica para mantenerla limpia y seca.<br><br>Aplicación de medicamentos: Las gasas estériles se utilizan para aplicar pomadas, cremas o medicamentos tópicos a la piel de manera uniforme y sin contaminación.<br><br>Protección de catéteres: En procedimientos médicos que requieren la inserción de catéteres u otros dispositivos, las gasas estériles se utilizan para proteger el sitio de inserción y mantenerlo libre de infecciones.<br><br>Protección de áreas sensibles: En ciertas cirugías, como las oftalmológicas, las gasas estériles se colocan sobre áreas sensibles para protegerlas de la contaminación y garantizar la esterilidad del campo quirúrgico.";

const defGasasLimpias = "Las gasas limpias son un elemento esencial en los botiquines de primeros auxilios y tienen varias funciones importantes relacionadas con el tratamiento de heridas y lesiones menores. Algunas de las funciones clave de las gasas limpias en un botiquín son las siguientes: <br><br> 1. Limpieza de heridas: Las gasas limpias se utilizan para limpiar heridas y cortes antes de aplicar cualquier tipo de apósito o vendaje. <br> 2. Absorción de sangre y exudados: Las gasas son altamente absorbentes y se utilizan para absorber sangre, fluidos corporales y exudados de heridas o abrasiones. <br> 3. Protección de heridas: Se pueden usar gasas limpias como una capa protectora entre la herida y el apósito o vendaje, ayudando a evitar que el apósito se adhiera directamente a la herida. <br> 4. Aplicación de medicamentos tópicos: En algunos casos, las gasas limpias se empapan con medicamentos tópicos, como soluciones antisépticas o ungüentos antibióticos, antes de aplicarlas sobre la herida. <br> Prevención de infecciones: Al limpiar adecuadamente y proteger las heridas con gasas limpias, se reduce el riesgo de infección en las lesiones menores.";

const defhidroxidoAluminio = "El hidróxido de aluminio es un compuesto químico formado por átomos de aluminio, oxígeno e hidrógeno. Se presenta en forma de un polvo blanco o una suspensión líquida y es conocido por su capacidad para actuar como un antiácido.<br>El hidróxido de aluminio tiene varias aplicaciones y usos, siendo el más común el siguiente:<br><br>Antiácido: El hidróxido de aluminio se utiliza para tratar afecciones gastrointestinales, como la acidez estomacal, la indigestión y la úlcera péptica. Funciona neutralizando el ácido clorhídrico en el estómago, lo que ayuda a aliviar la sensación de ardor y la acidez en el esófago y el estómago. Esta acción neutralizante del ácido es particularmente útil en el tratamiento de la enfermedad por reflujo gastroesofágico (ERGE).";

const defInmovilizadores = "Los inmovilizadores son dispositivos médicos diseñados para fijar o mantener una parte específica del cuerpo en una posición fija o inmóvil. Están diseñados para ser seguros y cómodos, y generalmente están hechos de materiales acolchados y ajustables que se adaptan a la forma del cuerpo.<br>Los inmovilizadores tienen varias aplicaciones en el campo médico y traumatológico, que incluyen:<br><br>Estabilización de fracturas: Los inmovilizadores se utilizan para mantener los huesos en una posición fija y alineada después de una fractura ósea. Esto ayuda a promover una correcta curación ósea y a prevenir movimientos que podrían causar más daño.<br><br>Inmovilización de articulaciones: En casos de lesiones en las articulaciones, como esguinces graves o luxaciones, los inmovilizadores se utilizan para inmovilizar la articulación afectada y permitir que los ligamentos y tejidos dañados se reparen sin interferencias.<br><br>Apoyo después de cirugía: Después de ciertas cirugías, como las relacionadas con el sistema musculoesquelético, los inmovilizadores se usan para mantener la posición correcta de la extremidad o articulación intervenida durante el proceso de recuperación.<br><br>Prevención de lesiones secundarias: En casos de lesiones graves, como lesiones de la médula espinal o fracturas múltiples, los inmovilizadores se pueden utilizar para prevenir daños adicionales al limitar el movimiento del paciente y proteger la zona afectada.<br><br>Transporte seguro: Los inmovilizadores son esenciales para el transporte seguro de pacientes con lesiones en las que el movimiento podría agravar su condición, como en accidentes automovilísticos o caídas.";

const defLinterna = "Una linterna en un botiquín es una linterna portátil que forma parte de un botiquín de primeros auxilios o kit de emergencia. Estas linternas suelen ser compactas y funcionan con pilas o baterías para proporcionar iluminación cuando no está disponible la luz natural o eléctrica.<br>Una linterna en un botiquín tiene varios propósitos importantes:<br><br>Iluminación en emergencias: En situaciones de emergencia, como cortes de energía eléctrica, apagones o desastres naturales, una linterna en el botiquín es esencial para proporcionar luz, lo que permite a las personas ver y moverse con seguridad en la oscuridad.<br><br>Exploración de heridas: Cuando alguien resulta herido y se necesita brindar primeros auxilios, la linterna puede utilizarse para examinar la herida y evaluar su gravedad. La iluminación adecuada es crucial para un tratamiento efectivo.<br><br>Examen médico: En caso de una lesión o enfermedad repentina, una linterna en el botiquín puede ayudar a los socorristas o profesionales de la salud a realizar un examen médico básico, como verificar la garganta, los oídos o los ojos del paciente.<br><br>Busqueda de objetos o suministros: En una situación de emergencia, una linterna puede ser útil para buscar objetos o suministros necesarios en el botiquín o en el entorno circundante.<br><br>Orientación y seguridad: La linterna también puede utilizarse para iluminar el camino o señalizar en situaciones de evacuación o búsqueda y rescate.";

const defMascararcp = "Una mascarilla de RCP es un dispositivo que consta de una máscara facial transparente que se coloca sobre la boca y la nariz de un paciente y una válvula unidireccional y una bolsa que están conectadas a la máscara. La válvula unidireccional permite que el aire fluya desde la bolsa hacia los pulmones del paciente cuando se aplica presión sobre la bolsa, pero evita que el aire fluya en la dirección opuesta, reduciendo así el riesgo de contaminación cruzada.<br>Una mascarilla de RCP se utiliza en situaciones de emergencia para proporcionar ventilación artificial a una persona que ha dejado de respirar o cuyo corazón ha dejado de latir. Su uso tiene varios propósitos importantes en el contexto de la RCP:<br><br>Ventilación: Cuando una persona no puede respirar por sí misma o su respiración es inadecuada, una mascarilla de RCP permite a los socorristas o profesionales de la salud administrar aire o oxígeno en los pulmones del paciente de manera controlada y eficaz.<br><br>Prevención de contaminación: La válvula unidireccional en la mascarilla evita que el aire exhalado por el paciente entre en contacto con el socorrista o el personal de salud, lo que ayuda a prevenir la contaminación cruzada y protege al personal contra enfermedades o infecciones transmitidas por el aire.<br><br>Mejora de la oxigenación: La mascarilla de RCP permite administrar oxígeno concentrado si es necesario para mejorar la oxigenación del paciente.<br><br>Facilitación de la RCP: En el contexto de la RCP, la ventilación artificial con una mascarilla de RCP se combina con compresiones torácicas para mantener el flujo sanguíneo y proporcionar oxígeno a los órganos vitales hasta que se pueda restablecer la circulación normal mediante desfibrilación o administración de medicamentos.";

const defPilas = "Las pilas en un botiquín son pilas alcalinas o pilas de litio que se mantienen en el botiquín de primeros auxilios como parte del suministro de emergencia. Estas pilas se almacenan en su empaque original y se mantienen en buen estado para su uso en dispositivos médicos que requieran alimentación eléctrica, como termómetros digitales, tensiómetros electrónicos, linternas médicas, nebulizadores portátiles y otros dispositivos médicos portátiles.<br>Las pilas en un botiquín tienen varios propósitos importantes en situaciones de emergencia y atención médica:<br><br>Alimentación de dispositivos médicos: En una emergencia médica, es fundamental que los dispositivos médicos funcionen adecuadamente para la evaluación y el tratamiento del paciente. Las pilas en el botiquín se utilizan para proporcionar energía a dispositivos como termómetros electrónicos, que se utilizan para tomar la temperatura del paciente de manera precisa y rápida.<br><br>Mediciones vitales: Algunos dispositivos médicos, como los tensiómetros electrónicos, se utilizan para medir la presión arterial. Estas mediciones son críticas en situaciones médicas y de primeros auxilios para evaluar la condición del paciente y tomar decisiones informadas sobre el tratamiento.<br><br>Iluminación: Las linternas médicas alimentadas por pilas se utilizan para examinar al paciente y proporcionar luz en áreas con poca iluminación. Esto es especialmente importante en situaciones de emergencia en las que se necesita una evaluación médica precisa.";

const defSolucion = "La solución salina, que es una solución de agua y sal (cloruro de sodio), tiene varias funciones en un botiquín de primeros auxilios. Uso de la solución salina en el contexto de los botiquines: <br><br> 1. Lavado de heridas: La solución salina estéril se utiliza comúnmente para lavar heridas y cortes. Limpia la herida, ayuda a eliminar la suciedad, los desechos y los gérmenes, y puede reducir el riesgo de infección. Es una alternativa segura al agua del grifo, que puede contener impurezas. <br> 2.Irrigación de ojos: En caso de contaminación con partículas extrañas o productos químicos en los ojos, la solución salina se utiliza para irrigar y limpiar los ojos. Puede ayudar a enjuagar y eliminar sustancias irritantes o peligrosas. <br> 3. Enjuague bucal y garganta: La solución salina se puede utilizar como enjuague bucal o garganta en situaciones en las que es necesario limpiar o desinfectar temporalmente la boca o la garganta. <br> 4. Hidratación de apósitos: La solución salina puede mantener la humedad de apósitos y gasas en aplicaciones médicas, lo que es beneficioso para evitar que se sequen y se peguen a la piel o la herida. <br> 5. Rehidratación oral: En algunas situaciones de deshidratación leve o pérdida de líquidos debido a vómitos o diarrea, la solución salina oral (también conocida como solución de rehidratación oral) puede ser utilizada para restablecer los niveles de electrolitos y líquidos en el cuerpo.";

const defTablaEspinal = "Una tabla espinal se utiliza en situaciones en las que se sospecha una lesión en la columna vertebral debido a un accidente o trauma. Su objetivo principal es evitar que la columna vertebral se mueva y se flexione, ya que cualquier movimiento indebido podría causar daño adicional a la médula espinal o los nervios que la rodean.La tabla espinal tiene varios propósitos importantes:<br><br>Inmovilización: Su función principal es inmovilizar la columna vertebral de una persona lesionada para evitar el movimiento, lo que ayuda a prevenir daños secundarios y posibles lesiones neurológicas.<br><br>Estabilización: La tabla espinal proporciona estabilidad a la persona lesionada, lo que reduce el riesgo de movimientos involuntarios o movimientos inducidos por el dolor.<br><br>Transporte seguro: Una vez que la persona está asegurada en la tabla espinal, se puede mover con mayor seguridad, evitando movimientos de torsión o flexión de la columna vertebral que podrían ser perjudiciales. Esto es esencial para el transporte desde el lugar del accidente hasta el hospital.<br><br>Facilita la atención médica: Al mantener la columna vertebral inmóvil, la tabla espinal facilita la realización de evaluaciones médicas y radiológicas, como radiografías o tomografías computarizadas, para determinar la extensión de las lesiones en la columna vertebral.";

const defTensiometro = "Un tensiómetro es un dispositivo médico diseñado para medir la presión arterial, que es la fuerza ejercida por la sangre contra las paredes de las arterias cuando el corazón late (presión sistólica) y cuando el corazón está en reposo entre latidos (presión diastólica). La medición de la presión arterial se expresa generalmente en milímetros de mercurio (mmHg) y se presenta como una fracción, como 120/80 mmHg, donde 120 representa la presión sistólica y 80 la presión diastólica.Un tensiómetro sirve principalmente para:<br><br>Medir la presión arterial: Su función principal es medir la presión arterial de una persona. Esto es esencial para evaluar su salud cardiovascular y diagnosticar afecciones como la hipertensión (presión arterial alta) o la hipotensión (presión arterial baja).<br><br>Detectar problemas de salud: Las mediciones regulares de la presión arterial pueden ayudar a identificar problemas de salud subyacentes, como enfermedades cardiovasculares, enfermedades renales, diabetes y otros trastornos médicos que pueden afectar la presión arterial.<br><br>Evaluación de riesgo cardiovascular: La presión arterial es un factor de riesgo importante para enfermedades cardiovasculares, y las mediciones regulares con un tensiómetro pueden ayudar a evaluar el riesgo de enfermedades del corazón y a tomar medidas preventivas.";

const defTijeras = "Las tijeras en un botiquín son herramientas de corte diseñadas para ser utilizadas en procedimientos médicos y de primeros auxilios. Están diseñadas para ser seguras, precisas y fáciles de manejar en situaciones en las que se requiere cortar materiales médicos o prendas de vestir para brindar atención médica.Las tijeras en un botiquín tienen varios propósitos importantes:<br><br>Corte de vendajes y apósitos: Se utilizan para cortar vendajes, gasas y apósitos estériles que se aplican sobre heridas para limpiar y proteger.<br><br>Corte de cintas adhesivas: Las cintas adhesivas se utilizan comúnmente en la atención médica para fijar vendajes, tubos o dispositivos. Las tijeras son útiles para cortar estas cintas de manera segura y precisa.<br><br>Corte de vendajes elásticos: Los vendajes elásticos, como las vendas de compresión, se utilizan para inmovilizar y proteger áreas lesionadas. Las tijeras permiten cortar estos vendajes de manera que se puedan retirar con facilidad sin dañar la piel.";

const defBan2x5 = "Las vendas 2x5, que generalmente se refieren a una venda de 2 pulgadas de ancho por 5 yardas de longitud (aproximadamente 4.5 cm de ancho por 4.6 metros de largo), son un componente común en los botiquines de primeros auxilios y tienen varias funciones importantes: <br><br> 1. Sujetar apósitos: Una de las funciones principales de una venda 2x5 es sujetar apósitos, gasas o almohadillas sobre heridas o cortes. Se envuelve alrededor de la herida para mantener los materiales de curación en su lugar de manera segura. <br> 2. Inmovilización temporal: Puede utilizarse para inmovilizar temporalmente una articulación lesionada o una extremidad en caso de esguinces o fracturas leves. Por ejemplo, se puede usar para crear una férula improvisada junto con materiales de soporte adicionales. <br> 3. Fijación de splints (ferulas): En situaciones donde se necesite inmovilizar una extremidad lesionada, la venda 2x5 se puede utilizar para fijar splints o ferulas temporales en su lugar. <br> 4. Protección contra ampollas: En actividades al aire libre o deportes que involucran fricción, como el senderismo o el ciclismo, se puede usar una venda para proteger áreas propensas a ampollas, como los talones o los dedos de los pies.";

const defBan3x5 = "Las vendas 3x5 (a veces escritas como 3 x 5 y también conocidas como apósitos adhesivos o apósitos estériles) son elementos comunes en los botiquines de primeros auxilios y tienen varias funciones importantes: <br><br> 1. Cubrir heridas y cortes: Las vendas 3x5 se utilizan para cubrir y proteger heridas, cortes o abrasiones en la piel. Ayudan a prevenir la contaminación de la herida y reducen el riesgo de infección al mantenerla limpia. <br> 2. Detener el sangrado: Si hay sangrado de una herida, las vendas 3x5 pueden aplicarse para aplicar presión directa sobre la zona afectada y ayudar a detener el sangrado. Esto es especialmente útil en situaciones en las que se necesita un control rápido del sangrado antes de buscar atención médica. <br> 3. Promover la cicatrización: Al mantener una herida limpia y protegida, las vendas 3x5 contribuyen a un ambiente propicio para la cicatrización de la piel. Ayudan a prevenir la contaminación de la herida por bacterias y otros patógenos.";

const defBan5x5 = "Las vendas de 5x5 centímetros (cm) son un tipo de vendaje que se encuentra comúnmente en los botiquines de primeros auxilios y se utilizan para diversas funciones en el tratamiento de heridas y lesiones menores. <br> 1. Presionar hemorragias: En caso de heridas con sangrado, las vendas de este tamaño pueden utilizarse para aplicar presión sobre la herida y detener el sangrado. Es importante hacerlo con cuidado y aplicar presión directa sobre la herida, pero evitando ejercer demasiada presión. <br> 2. Soporte para heridas y quemaduras: Si alguien tiene una herida o quemadura en una zona que requiere soporte o protección adicional, como los dedos, las manos o los pies, estas vendas pueden ser útiles para brindar ese soporte y evitar el movimiento excesivo. <br> 3. Envolver dedos o extremidades pequeñas: Las vendas de este tamaño son ideales para envolver y proteger dedos, manos, pies o cualquier otra extremidad pequeña lesionada.";

const defVaso = "Un vaso en un botiquín es un recipiente pequeño, generalmente de plástico o papel, que se utiliza para contener líquidos, incluyendo medicamentos líquidos, agua u otros fluidos. Estos vasos suelen ser desechables y vienen en tamaños adecuados para medir y administrar dosis precisas de líquidos.<br>Un vaso en un botiquín puede servir para varios propósitos relacionados con la atención médica y el uso de medicamentos:<br><br>Medir dosis líquidas: Cuando se necesita administrar medicamentos líquidos, un vaso se puede utilizar para medir con precisión la cantidad correcta de medicamento antes de tomarlo. Esto es especialmente importante para asegurarse de que se esté tomando la dosis correcta según las indicaciones del médico.<br><br>Facilitar la toma de medicamentos: Algunas personas encuentran más fácil tomar medicamentos líquidos cuando se sirven en un vaso en lugar de beber directamente del frasco. Esto puede ayudar a garantizar que se consuma toda la dosis y que no se desperdicie.<br><br>Mezclar medicamentos: En situaciones en las que se deben mezclar medicamentos líquidos o diluirlos antes de la administración, un vaso se puede utilizar para combinar las sustancias de manera adecuada.";

const defVendalgodon5x5 = "Las vendas de algodón son versátiles y esenciales en un botiquín de primeros auxilios, ya que pueden ser útiles en una variedad de situaciones médicas y lesiones menores. Sin embargo, es importante saber cómo aplicarlas correctamente y cuándo buscar atención médica profesional en caso de lesiones graves o complicadas. <br><br> 1. Protección de heridas: Las vendas de algodón se utilizan comúnmente para proteger heridas, cortes o abrasiones de la contaminación externa y para mantener un ambiente limpio y estéril alrededor de la herida. <br> 2. Presión y soporte: Las vendas de algodón se pueden usar para aplicar presión controlada sobre una herida que sangra levemente, lo que puede ayudar a detener el sangrado. También se pueden utilizar para proporcionar soporte a una articulación lesionada o para inmovilizar temporalmente una extremidad en caso de fractura o esguince leve. <br> 3. Vendaje compresivo: Las vendas de algodón se pueden usar en la técnica conocida como vendaje compresivo. Esto implica envolver una venda alrededor de una parte del cuerpo lesionada para reducir la hinchazón y controlar el sangrado. Es especialmente útil en casos de esguinces y contusiones.";

const retroali = [defAcetaminofen,defAsa,defBajalenguas,defClorohexidia,defCollarCervical,defCollarCervicalNiño,defCompresas,defEsparadrapo,defEstetoscopio,defGasaEsteril,defGasasLimpias,defhidroxidoAluminio,defInmovilizadores,defLinterna,defMascararcp,defPilas,defSolucion,defTablaEspinal,defTensiometro,defTijeras,defBan2x5,defBan3x5,defBan5x5,defVaso,defVendalgodon5x5];

const createElement = (tag, className) => {
  const element = document.createElement(tag);
  element.className = className;
  return element;
}

let firstCard = '';
let secondCard = '';

const checkEndGame = () => {
  const disabledCards = document.querySelectorAll('.disabled-card');

  if (disabledCards.length === 56) {

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