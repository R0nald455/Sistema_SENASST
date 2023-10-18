
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
    <link rel="stylesheet" href="./styles/stylesBS.css">
    <link rel="stylesheet" href="./styles/fichasB.css">
    <link rel="stylesheet" href="./styles/retroAli.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Practica botiquin B</title>
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
                </div>

            </div>

            <div class="cont-izqui">
                <h2>Usuario: <?php echo $_SESSION["nombre"] ?></h2>
                <h1>Elementos del botiquín tipo B</h1>
                <div class="cont-retroali">

                    <div class="retroBoti" id="z0"><h3>El esparadrapo es una cinta adhesiva flexible y autoadherente que se utiliza para sujetar vendajes, apósitos o gasas en su lugar sobre heridas o áreas lesionadas en la piel. Su principal función es mantener los materiales de curación en su sitio, lo que ayuda a proteger la herida, prevenir infecciones y promover la curación.</h3></div>
                    <div class="retroBoti" id="z1"><h3>El alcohol de botiquín generalmente se refiere al alcohol isopropílico, también conocido como isopropanol, que es un alcohol sintético utilizado con fines médicos y de higiene.</h3></div>
                    <div class="retroBoti" id="z2"><h3>Un bajalenguas es un dispositivo utilizado por profesionales de la salud, como médicos y dentistas, para mantener la boca del paciente abierta durante un examen físico o un procedimiento médico. Consiste en una pieza plana y larga que se coloca en la boca, debajo de la lengua, y ayuda a mantener la lengua y las mejillas alejadas.</h3></div>
                    <div class="retroBoti" id="z3"><h3>Las gasas son productos médicos que consisten en tejido o algodón esterilizado y suave, generalmente en forma de láminas o paños delgados. Las gasas son utilizadas en el ámbito médico para diversas aplicaciones, principalmente en el cuidado de heridas y la higiene.</h3></div>
                    <div class="retroBoti" id="z4"><h3>Los guantes de látex son prendas protectoras hechas de látex de caucho natural y se utilizan para una variedad de aplicaciones, principalmente en entornos médicos y de laboratorio.</h3></div>
                    <div class="retroBoti" id="z5"><h3>Una solución salina es una mezcla de agua y sal que se utiliza en una variedad de aplicaciones médicas y de cuidado personal. Se caracteriza por tener una concentración específica de sal disuelta en agua, que generalmente es similar a la del fluido en el cuerpo humano.</h3></div>
                    <div class="retroBoti" id="z6"><h3>Un termómetro médico es un dispositivo diseñado específicamente para medir la temperatura del cuerpo humano. Puede existir en varias formas, incluyendo termómetros orales, axilares, timpánicos y de frente. Su función principal es proporcionar una lectura precisa de la temperatura corporal de una persona.</h3></div>
                    <div class="retroBoti" id="z7"><h3>Una venda elástica 2x5 es una banda o venda fabricada con un material elástico que tiene una anchura de 2 pulgadas y una longitud de 5 yardas (aproximadamente 4.6 metros). Este tipo de venda es conocido por su capacidad para estirarse y recuperar su forma original, lo que permite un ajuste seguro y cómodo alrededor de una parte del cuerpo.</h3></div>
                    <div class="retroBoti" id="z8"><h3>Esta venda está hecha de un material elástico que puede estirarse y luego volver a su forma original. La elasticidad permite que la venda se ajuste cómodamente a la zona del cuerpo donde se aplique y proporcione una compresión suave y constante.</h3></div>
                    <div class="retroBoti" id="z9"><h3>Una venda elástica 5x5 es un material médico utilizado para proporcionar compresión y soporte a una parte del cuerpo lesionada o vulnerable. Tiene una anchura de 5 centímetros, lo que permite envolver y sostener una extremidad o articulación de manera segura.</h3></div>
                    <div class="retroBoti" id="z10"><h3>Una venda de algodón 3x5 es un material utilizado en el campo de los primeros auxilios y la atención médica. Está diseñada para ser un apósito versátil que puede utilizarse para varias aplicaciones.</h3></div>
                    <div class="retroBoti" id="z11"><h3>La yodopovidona es una solución o ungüento que contiene yodo y povidona, y se utiliza principalmente como antiséptico y desinfectante. Se utiliza para limpiar y desinfectar la piel, mucosas y heridas en el ámbito médico y de primeros auxilios.</h3></div>

                    <div class="retroBoti" id="z12"><h3>Es un dispositivo de protección personal diseñado para resguardar la cara del usuario de peligros potenciales en el entorno laboral. Estas caretas están diseñadas para proporcionar protección contra salpicaduras, partículas en el aire, vapores químicos, impactos y otros riesgos que puedan afectar la vista o la piel facial del trabajador. </h3></div>
                    <div class="retroBoti" id="z13"><h3>Es un equipo de protección personal diseñado para proteger la cabeza de los trabajadores en diversos entornos laborales. Su función principal es reducir el riesgo de lesiones en la cabeza causadas por caídas de objetos, golpes, impactos o cualquier otro peligro que pueda existir en el lugar de trabajo.</h3></div>
                    <div class="retroBoti" id="z14"><h3>Es una prenda de vestir diseñada específicamente para mejorar la visibilidad y la seguridad de las personas en entornos laborales, especialmente en situaciones donde hay riesgos de colisión, como en la construcción, en carreteras, en almacenes o en trabajos nocturnos</h3></div>
                    <div class="retroBoti" id="z15"><h3>El color amarillo en un extintor puede tener varias interpretaciones según las normativas locales o los estándares de seguridad, pero en general, se usa para indicar que el extintor contiene un agente extintor específico, como dióxido de carbono (CO2) o agua pulverizada, que es adecuado para apagar ciertos tipos de incendios, como los incendios de clase C (que involucran equipos eléctricos).</h3></div>
                    <div class="retroBoti" id="z16"><h3>Su función principal es prevenir lesiones oculares y mantener la visión del trabajador segura durante la realización de tareas en las que existen riesgos para los ojos. Estos riesgos pueden variar según el tipo de trabajo y pueden incluir actividades como la construcción, la manipulación de productos químicos, la soldadura, la carpintería, entre otros.</h3></div>
                    <div class="retroBoti" id="z17"><h3>Son equipos de protección personal diseñados para resguardar las manos de los trabajadores contra riesgos y peligros que puedan causar lesiones o enfermedades ocupacionales. </h3></div>
                    <div class="retroBoti" id="z18"><h3>El ácido acetilsalicílico, comúnmente conocido como aspirina, es un medicamento ampliamente utilizado que pertenece a la clase de los antiinflamatorios no esteroides (AINE). Tiene varias propiedades farmacológicas, pero se utiliza principalmente para aliviar el dolor, reducir la fiebre y disminuir la inflamación.</h3></div>
                    <div class="retroBoti" id="z19"><h3>Las compresas son un componente esencial en un botiquín de primeros auxilios debido a su versatilidad y capacidad para tratar y proteger una variedad de lesiones y heridas. Ayudan a controlar el sangrado, limpiar heridas, prevenir infecciones y brindar comodidad y soporte en situaciones de emergencia o lesiones menores.</h3></div>
                    <div class="retroBoti" id="z20"><h3>Las pilas en un botiquín generalmente se incluyen para alimentar dispositivos médicos y herramientas que pueden ser necesarios en situaciones de emergencia o atención médica. </h3></div>
                    <div class="retroBoti" id="z21"><h3>Las tijeras son herramientas fundamentales en un botiquín de primeros auxilios que permiten realizar cortes precisos, acceder rápidamente a heridas y objetos extraños, preparar materiales y proporcionar un cuidado adecuado en situaciones de emergencia y atención médica.</h3></div>
                    <div class="retroBoti" id="z22"><h3>Un vaso de plástico en un botiquín se utiliza principalmente para medir y administrar líquidos, como medicamentos líquidos, soluciones orales, o agua, de manera controlada y precisa.</h3></div>
                    <div class="retroBoti" id="z23"><h3>Una linterna es un elemento útil en un botiquín de primeros auxilios debido a su capacidad para proporcionar iluminación en situaciones de emergencia o cuando se requiere atención médica.</h3></div>

                </div>

            </div>

            <div class="cont-izqui-abajo">

                <div class="cont-abajo-dentro">

                    <div class="cont-generar-elements">
                        <div class="boti"  draggable="true" ondragstart="dragStart(event)"  id="c0" ></div>
                        <div class="alcohol" draggable="true" ondragstart="dragStart(event)"  id="c1" ></div>
                        <div class="bajalenguas" draggable="true" ondragstart="dragStart(event)"  id="c2" ></div>
                        <div class="gasas" draggable="true" ondragstart="dragStart(event)"  id="c3" ></div>
                        <div class="guanteslatex" draggable="true" ondragstart="dragStart(event)"  id="c4" ></div>
                        <div class="solucionsalina" draggable="true" ondragstart="dragStart(event)"  id="c5" ></div>
                        <div class="termometro" draggable="true" ondragstart="dragStart(event)"  id="c6" ></div>
                        <div class="vanda2x5" draggable="true" ondragstart="dragStart(event)"  id="c7" ></div>
                        <div class="vanda3x5" draggable="true" ondragstart="dragStart(event)"  id="c8" ></div>
                        <div class="vanda5x5" draggable="true" ondragstart="dragStart(event)"  id="c9" ></div>
                        <div class="vendaalgodon3x5" draggable="true" ondragstart="dragStart(event)"  id="c10" ></div>
                        <div class="yodopovidona" draggable="true" ondragstart="dragStart(event)"  id="c11" ></div>
                        <div class="careta" draggable="true" ondragstart="dragStart(event)"  id="c12" ></div>
                        <div class="casco" draggable="true" ondragstart="dragStart(event)"  id="c13" ></div>
                        <div class="chaleco" draggable="true" ondragstart="dragStart(event)"  id="c14" ></div>
                        <div class="extintor" draggable="true" ondragstart="dragStart(event)"  id="c15" ></div>
                        <div class="gafas" draggable="true" ondragstart="dragStart(event)"  id="c16" ></div>
                        <div class="guantesPro" draggable="true" ondragstart="dragStart(event)"  id="c17" ></div>
                        <div class="asa" draggable="true" ondragstart="dragStart(event)"  id="c18" ></div>
                        <div class="compresas" draggable="true" ondragstart="dragStart(event)"  id="c19" ></div>
                        <div class="pilas" draggable="true" ondragstart="dragStart(event)"  id="c20" ></div>
                        <div class="tijeras" draggable="true" ondragstart="dragStart(event)"  id="c21" ></div>
                        <div class="vaso" draggable="true" ondragstart="dragStart(event)"  id="c22" ></div>
                        <div class="linterna" draggable="true" ondragstart="dragStart(event)"  id="c23" ></div>

                    </div>
                    
                    <input type="submit" id="btn-g" onclick="GenerarFicha();" value="Generar elemento">
                    <input type="submit" id="btn-c" onclick="Comprobar();" value="Comprobar elementos">
                    <input type="submit" id="btn-n" onclick="noPertenece();" value="No pertenece" >
                
                </div>

            </div>
            
        </div>
    </div>

<script src="logicaPracticaBotiAa.js"></script>

</body>
</html>