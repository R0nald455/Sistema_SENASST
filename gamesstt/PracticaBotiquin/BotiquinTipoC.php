
<?php
session_start();
if (empty($_SESSION["idSe"])){
    header("location: ../index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/stylesCC.css">
    <link rel="stylesheet" href="./styles/fichasC.css">
    <link rel="stylesheet" href="./styles/retroAli.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Practica botiquin C</title>
</head>
<body>
    
    <div id="container">
        <div class="principal-container">
            
            <div class="cont-dere">

                <div id="img-botiquin"></div>
                <input type="submit" id="btn-salir" value="">
                
                <div class="cont-elementos">
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="0"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="1"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="2"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="3"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="4"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="5"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="6"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="7"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="8"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="9"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="10"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="11"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="12"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="13"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="14"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="15"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="16"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="17"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="18"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="19"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="20"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="21"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="22"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="23"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="24"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="25"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="26"></div>
                    <div class="ElementoCuadro" ondrop="dragDrop(event)" ondragover="allowDrop(event)" id="27"></div>
                </div>

            </div>

            <div class="cont-izqui">
                <h2>Usuario: <?php echo $_SESSION["nombre"] ?></h2>
                <h1>Elementos del botiquín tipo C</h1>
                <div class="cont-retroali">

                    <div class="retroBoti" id="z0"><h3>El acetaminofén, o paracetamol en algunos lugares, es un medicamento ampliamente usado como analgésico y antipirético. Se emplea para aliviar dolores leves a moderados, como dolores de cabeza, musculares, dentales y menstruales, además de reducir la fiebre causada por infecciones y otras condiciones médicas.</h3></div>
                    <div class="retroBoti" id="z1"><h3>El alcohol de botiquín generalmente se refiere al alcohol isopropílico, también conocido como isopropanol, que es un alcohol sintético utilizado con fines médicos y de higiene.</h3></div>
                    <div class="retroBoti" id="z2"><h3>La aspirina, o Ácido Acetilsalicílico (ASA), es un medicamento ampliamente usado que pertenece a los antiinflamatorios no esteroides (AINEs). Sus principales aplicaciones médicas incluyen ser un analgésico eficaz para aliviar dolores leves a moderados, un antipirético que reduce la fiebre causada por infecciones u otras condiciones médicas, y un antiinflamatorio con capacidad moderada para reducir la inflamación en afecciones como la artritis reumatoide.</h3></div>
                    <div class="retroBoti" id="z3"><h3>Los bajalenguas son herramientas médicas pequeñas y planas, hechas de diversos materiales como madera, plástico o metal, utilizadas para sujetar la lengua del paciente durante exámenes bucales y de garganta.</h3></div>
                    <div class="retroBoti" id="z4"><h3>Un collar cervical es una estructura que rodea el cuello y se ajusta de manera cómoda alrededor de él. Viene en diferentes tamaños y tipos, desde collares rígidos que no permiten ningún movimiento del cuello hasta collares más flexibles que permiten cierto grado de movimiento.</h3></div>
                    <div class="retroBoti" id="z5"><h3>Un collar cervical para niños es un dispositivo médico que rodea el cuello del niño y se ajusta de manera cómoda para proporcionar soporte y restricción de movimiento en la zona cervical. Está disponible en diferentes tamaños y tipos, y suele estar hecho de materiales acolchados y flexibles que son adecuados para el cuerpo en desarrollo de un niño</h3></div>
                    <div class="retroBoti" id="z6"><h3>Las compresas son dispositivos que constan de una capa exterior suave y a menudo impermeable, y una capa interna que contiene un material absorbente, como gel, arroz, semillas de lino o un relleno similar. Pueden tener diferentes formas y tamaños, y se pueden calentar en un microondas o enfriar en el congelador antes de aplicarlas en el cuerpo.</h3></div>
                    <div class="retroBoti" id="z7"><h3>El esparadrapo es un elemento común que se encuentra en muchos botiquines de primeros auxilios y se utiliza para varios propósitos relacionados con el tratamiento de heridas y lesiones menores.</h3></div>
                    <div class="retroBoti" id="z8"><h3>Un fonendoscopio es un dispositivo médico que consta de un tubo largo y flexible, generalmente de goma o plástico, con dos auriculares en un extremo y un diafragma o una campana en el otro extremo. Los auriculares se colocan en los oídos del profesional de la salud, mientras que el diafragma o la campana se coloca sobre el cuerpo del paciente para escuchar los sonidos internos.</h3></div>
                    <div class="retroBoti" id="z9"><h3>Las gasas estériles son paños o tejidos de algodón limpios y sin contaminación que se han sometido a un proceso de esterilización, generalmente utilizando calor, vapor o radiación, para eliminar cualquier bacteria, virus u otros microorganismos. Este proceso asegura que las gasas estén libres de patógenos y sean seguras para su uso en procedimientos médicos y curas.</h3></div>
                    <div class="retroBoti" id="z10"><h3>Las gasas limpias son un elemento esencial en los botiquines de primeros auxilios y tienen varias funciones importantes relacionadas con el tratamiento de heridas y lesiones menores.</h3></div>
                    <div class="retroBoti" id="z11"><h3>Los guantes de látex en los botiquines de primeros auxilios tienen una función esencial en la prevención de la contaminación y la protección tanto del auxiliador como del paciente en diversas situaciones médicas.</h3></div>
                    <div class="retroBoti" id="z12"><h3>El hidróxido de aluminio es un compuesto químico formado por átomos de aluminio, oxígeno e hidrógeno. Se presenta en forma de un polvo blanco o una suspensión líquida y es conocido por su capacidad para actuar como un antiácido.</h3></div>
                    <div class="retroBoti" id="z13"><h3>Los inmovilizadores son dispositivos médicos diseñados para fijar o mantener una parte específica del cuerpo en una posición fija o inmóvil. Están diseñados para ser seguros y cómodos, y generalmente están hechos de materiales acolchados y ajustables que se adaptan a la forma del cuerpo.</h3></div>
                    <div class="retroBoti" id="z14"><h3>Un jabón líquido en un botiquín es un producto de higiene personal en forma de líquido que se utiliza para lavar y desinfectar las manos. Estos jabones están diseñados para ser utilizados por profesionales de la salud, como médicos, enfermeras y personal de atención médica, así como en entornos médicos y clínicos en general. Suelen venir en envases que permiten una dosificación precisa y controlada.</h3></div>
                    <div class="retroBoti" id="z15"><h3>Una linterna en un botiquín es una linterna portátil que forma parte de un botiquín de primeros auxilios o kit de emergencia. Estas linternas suelen ser compactas y funcionan con pilas o baterías para proporcionar iluminación cuando no está disponible la luz natural o eléctrica.</h3></div>
                    <div class="retroBoti" id="z16"><h3>Una mascarilla de RCP es un dispositivo que consta de una máscara facial transparente que se coloca sobre la boca y la nariz de un paciente y una válvula unidireccional y una bolsa que están conectadas a la máscara. La válvula unidireccional permite que el aire fluya desde la bolsa hacia los pulmones del paciente cuando se aplica presión sobre la bolsa, pero evita que el aire fluya en la dirección opuesta, reduciendo así el riesgo de contaminación cruzada. </h3></div>
                    <div class="retroBoti" id="z17"><h3>Las pilas en un botiquín son pilas alcalinas o pilas de litio que se mantienen en el botiquín de primeros auxilios como parte del suministro de emergencia. Estas pilas se almacenan en su empaque original y se mantienen en buen estado para su uso en dispositivos médicos que requieran alimentación eléctrica, como termómetros digitales, tensiómetros electrónicos, linternas médicas, nebulizadores portátiles y otros dispositivos médicos portátiles.</h3></div>
                    <div class="retroBoti" id="z18"><h3>Una solución salina es una mezcla de agua y sal que se utiliza en una variedad de aplicaciones médicas y de cuidado personal. Se caracteriza por tener una concentración específica de sal disuelta en agua, que generalmente es similar a la del fluido en el cuerpo humano.</h3></div>
                    <div class="retroBoti" id="z19"><h3>Una tabla espinal se utiliza en situaciones en las que se sospecha una lesión en la columna vertebral debido a un accidente o trauma. Su objetivo principal es evitar que la columna vertebral se mueva y se flexione, ya que cualquier movimiento indebido podría causar daño adicional a la médula espinal o los nervios que la rodean.</h3></div>
                    <div class="retroBoti" id="z20"><h3>Un tensiómetro es un dispositivo médico diseñado para medir la presión arterial, que es la fuerza ejercida por la sangre contra las paredes de las arterias cuando el corazón late (presión sistólica) y cuando el corazón está en reposo entre latidos (presión diastólica). La medición de la presión arterial se expresa generalmente en milímetros de mercurio (mmHg) y se presenta como una fracción, como 120/80 mmHg, donde 120 representa la presión sistólica y 80 la presión diastólica.</h3></div>
                    <div class="retroBoti" id="z21"><h3>Los termómetros son instrumentos médicos esenciales que a menudo se incluyen en los botiquines de primeros auxilios. Su función principal es medir la temperatura corporal de una persona. Esta información es valiosa para evaluar la salud de alguien, especialmente en situaciones donde se sospecha de fiebre o hipotermia.</h3></div>
                    <div class="retroBoti" id="z22"><h3>Las tijeras en un botiquín son herramientas de corte diseñadas para ser utilizadas en procedimientos médicos y de primeros auxilios. Están diseñadas para ser seguras, precisas y fáciles de manejar en situaciones en las que se requiere cortar materiales médicos o prendas de vestir para brindar atención médica.</h3></div>
                    <div class="retroBoti" id="z23"><h3>Una venda elástica 2x5 es una banda o venda fabricada con un material elástico que tiene una anchura de 2 pulgadas y una longitud de 5 yardas (aproximadamente 4.6 metros). Este tipo de venda es conocido por su capacidad para estirarse y recuperar su forma original, lo que permite un ajuste seguro y cómodo alrededor de una parte del cuerpo.</h3></div>
                    <div class="retroBoti" id="z24"><h3>Una venda de algodón 3x5 es un material utilizado en el campo de los primeros auxilios y la atención médica. Está diseñada para ser un apósito versátil que puede utilizarse para varias aplicaciones.</h3></div>
                    <div class="retroBoti" id="z25"><h3>Una venda elástica 5x5 es un material médico utilizado para proporcionar compresión y soporte a una parte del cuerpo lesionada o vulnerable. Tiene una anchura de 5 centímetros, lo que permite envolver y sostener una extremidad o articulación de manera segura.</h3></div>
                    <div class="retroBoti" id="z26"><h3>Un vaso en un botiquín es un recipiente pequeño, generalmente de plástico o papel, que se utiliza para contener líquidos, incluyendo medicamentos líquidos, agua u otros fluidos. Estos vasos suelen ser desechables y vienen en tamaños adecuados para medir y administrar dosis precisas de líquidos.</h3></div>
                    <div class="retroBoti" id="z27"><h3>Las vendas de algodón son versátiles y esenciales en un botiquín de primeros auxilios, ya que pueden ser útiles en una variedad de situaciones médicas y lesiones menores. Sin embargo, es importante saber cómo aplicarlas correctamente y cuándo buscar atención médica profesional en caso de lesiones graves o complicadas. </h3></div>

                    <div class="retroBoti" id="z28"><h3>Es un dispositivo de protección personal diseñado para resguardar la cara del usuario de peligros potenciales en el entorno laboral. Estas caretas están diseñadas para proporcionar protección contra salpicaduras, partículas en el aire, vapores químicos, impactos y otros riesgos que puedan afectar la vista o la piel facial del trabajador. </h3></div>
                    <div class="retroBoti" id="z29"><h3>Es un equipo de protección personal diseñado para proteger la cabeza de los trabajadores en diversos entornos laborales. Su función principal es reducir el riesgo de lesiones en la cabeza causadas por caídas de objetos, golpes, impactos o cualquier otro peligro que pueda existir en el lugar de trabajo.</h3></div>
                    <div class="retroBoti" id="z30"><h3>Es una prenda de vestir diseñada específicamente para mejorar la visibilidad y la seguridad de las personas en entornos laborales, especialmente en situaciones donde hay riesgos de colisión, como en la construcción, en carreteras, en almacenes o en trabajos nocturnos</h3></div>
                    <div class="retroBoti" id="z31"><h3>El color amarillo en un extintor puede tener varias interpretaciones según las normativas locales o los estándares de seguridad, pero en general, se usa para indicar que el extintor contiene un agente extintor específico, como dióxido de carbono (CO2) o agua pulverizada, que es adecuado para apagar ciertos tipos de incendios, como los incendios de clase C (que involucran equipos eléctricos).</h3></div>
                    <div class="retroBoti" id="z32"><h3>Su función principal es prevenir lesiones oculares y mantener la visión del trabajador segura durante la realización de tareas en las que existen riesgos para los ojos. Estos riesgos pueden variar según el tipo de trabajo y pueden incluir actividades como la construcción, la manipulación de productos químicos, la soldadura, la carpintería, entre otros.</h3></div>
                    <div class="retroBoti" id="z33"><h3>Son equipos de protección personal diseñados para resguardar las manos de los trabajadores contra riesgos y peligros que puedan causar lesiones o enfermedades ocupacionales. </h3></div>
                    <div class="retroBoti" id="z34"><h3>Estas botas están diseñadas para proteger los pies y las piernas de lesiones causadas por una variedad de riesgos, como objetos pesados que puedan caer, materiales cortantes o punzantes, productos químicos corrosivos, temperaturas extremas, electricidad estática y resbalones.</h3></div>
                    <div class="retroBoti" id="z35"><h3>Son dispositivos diseñados para proteger los oídos de las personas contra daños causados por el ruido excesivo o potencialmente perjudicial. Estos dispositivos se utilizan en una variedad de entornos, como industrias ruidosas, construcción, conciertos, actividades recreativas ruidosas y más. </h3></div>
                    <div class="retroBoti" id="z36"><h3> La señal de riesgo eléctrico es un símbolo o señalización utilizada para advertir a las personas sobre la presencia de peligro relacionado con la electricidad en un área o equipo específico.  </h3></div>
                    <div class="retroBoti" id="z37"><h3>Esta señal significa que es necesario usar ropa o equipo de protección, como cascos, gafas de seguridad, guantes, botas, chalecos reflectantes u otros elementos similares, para minimizar el riesgo de lesiones o daños a la salud mientras se realiza una tarea o se entra en una determinada área.</h3></div>
                    <div class="retroBoti" id="z38"><h3>Su significado es claro y directo: señala la presencia de un botiquín que contiene suministros médicos básicos y herramientas necesarias para proporcionar atención inicial en caso de lesiones o emergencias médicas.</h3></div>
                </div>

            </div>

            <div class="cont-izqui-abajo">

                <div class="cont-abajo-dentro">

                    <div class="cont-generar-elements">
                        <div class="aceta"  draggable="true" ondragstart="dragStart(event)"  id="c0" ></div>
                        <div class="alcohol" draggable="true" ondragstart="dragStart(event)"  id="c1" ></div>
                        <div class="asa100" draggable="true" ondragstart="dragStart(event)"  id="c2" ></div>
                        <div class="bajalenguas" draggable="true" ondragstart="dragStart(event)"  id="c3" ></div>
                        <div class="collarcervical" draggable="true" ondragstart="dragStart(event)"  id="c4" ></div>
                        <div class="collarcerviniño" draggable="true" ondragstart="dragStart(event)"  id="c5" ></div>
                        <div class="compresa" draggable="true" ondragstart="dragStart(event)"  id="c6" ></div>
                        <div class="esparadrapo" draggable="true" ondragstart="dragStart(event)"  id="c7" ></div>
                        <div class="fonendoscopio" draggable="true" ondragstart="dragStart(event)"  id="c8" ></div>
                        <div class="gasaesteril" draggable="true" ondragstart="dragStart(event)"  id="c9" ></div>
                        <div class="gasaslimpias" draggable="true" ondragstart="dragStart(event)"  id="c10" ></div>
                        <div class="guanteslatex" draggable="true" ondragstart="dragStart(event)"  id="c11" ></div>
                        <div class="hidroxidoaluminio" draggable="true" ondragstart="dragStart(event)"  id="c12" ></div>
                        <div class="inmovilizadores" draggable="true" ondragstart="dragStart(event)"  id="c13" ></div>
                        <div class="jabonquirur" draggable="true" ondragstart="dragStart(event)"  id="c14" ></div>
                        <div class="linterna" draggable="true" ondragstart="dragStart(event)"  id="c15" ></div>
                        <div class="mascaracp" draggable="true" ondragstart="dragStart(event)"  id="c16" ></div>
                        <div class="pilas" draggable="true" ondragstart="dragStart(event)"  id="c17" ></div>
                        <div class="solucionsalina" draggable="true" ondragstart="dragStart(event)"  id="c18" ></div>
                        <div class="tablaespinal" draggable="true" ondragstart="dragStart(event)"  id="c19" ></div>
                        <div class="tensiometro" draggable="true" ondragstart="dragStart(event)"  id="c20" ></div>
                        <div class="termometro" draggable="true" ondragstart="dragStart(event)"  id="c21" ></div>
                        <div class="tijeras" draggable="true" ondragstart="dragStart(event)"  id="c22" ></div>
                        <div class="vendaelastica2x5" draggable="true" ondragstart="dragStart(event)"  id="c23" ></div>
                        <div class="vendaelastica3x5" draggable="true" ondragstart="dragStart(event)"  id="c24" ></div>
                        <div class="vendaelastica5x5" draggable="true" ondragstart="dragStart(event)"  id="c25" ></div>
                        <div class="vaso" draggable="true" ondragstart="dragStart(event)"  id="c26" ></div>
                        <div class="vendaalgodon5x5" draggable="true" ondragstart="dragStart(event)"  id="c27" ></div>

        
                        <div class="careta" draggable="true" ondragstart="dragStart(event)"  id="c28" ></div>
                        <div class="casco" draggable="true" ondragstart="dragStart(event)"  id="c29" ></div>
                        <div class="chaleco" draggable="true" ondragstart="dragStart(event)"  id="c30" ></div>
                        <div class="extintor" draggable="true" ondragstart="dragStart(event)"  id="c31" ></div>
                        <div class="gafas" draggable="true" ondragstart="dragStart(event)"  id="c32" ></div>
                        <div class="guantesPro" draggable="true" ondragstart="dragStart(event)"  id="c33" ></div>
                        <div class="botas" draggable="true" ondragstart="dragStart(event)"  id="c34" ></div>
                        <div class="tapaoidos" draggable="true" ondragstart="dragStart(event)"  id="c35" ></div>
                        <div class="riesgoelectrico" draggable="true" ondragstart="dragStart(event)"  id="c36" ></div>
                        <div class="señalropaprotec" draggable="true" ondragstart="dragStart(event)"  id="c37" ></div>
                        <div class="primerosauxilios" draggable="true" ondragstart="dragStart(event)"  id="c38" ></div>

                    </div>

                    <input type="submit" id="btn-g" onclick="GenerarFicha();" value="Generar elemento">
                    <input type="submit" id="btn-c" onclick="Comprobar();" value="Comprobar elementos">
                    <input type="submit" id="btn-n" onclick="noPertenece();" value="No pertenece" >
                
                </div>

            </div>
            
        </div>
    </div>

<script src="logicaPracticaBotiCC.js"></script>

</body>
</html>