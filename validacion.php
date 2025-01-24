<?php
$respuestas_correctas = array(
    'Modulo1' => array(
        'q1' => 'c',
        'q2' => 'b',
        'q3' => 'b',
        'q4' => 'b',
        'q5' => 'a',
    ),
    'Modulo2' => array(
        'q6' => 'a',
        'q7' => 'b',
        'q8' => 'b',
        'q9' => 'a',
        'q10' => 'a',
    ),
    'Modulo3' => array(
        'q11' => 'b',
        'q12' => 'a',
        'q13' => 'c',
        'q14' => 'b',
        'q15' => 'c',
    ),
    'Modulo4' => array(
        'q16' => 'b',
        'q17' => 'a',
        'q18' => 'a',
        'q19' => 'b',
        'q20' => 'a',
    )
);

$puntajes = array(
    'Modulo1' => 0,
    'Modulo2' => 0,
    'Modulo3' => 0,
    'Modulo4' => 0,
);

// Verificar si el formulario ha sido enviado
$total_general = 0;
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submitted = true;
    foreach ($respuestas_correctas as $modulo => $preguntas) {
        foreach ($preguntas as $pregunta => $respuesta) {
            if (isset($_POST[$pregunta]) && $_POST[$pregunta] == $respuesta) {
                $puntajes[$modulo]++;
            }
        }
        $total_general += $puntajes[$modulo];
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            text-align: center;
        }

        .box {
            margin-bottom: 20px;
            padding: 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .box h3 {
            color: #555;
        }

        .box p,
        .box ul {
            text-align: justify;
        }

        .box ul {
            list-style-position: inside;
        }

        .box li {
            margin-bottom: 10px;
        }

        .result-box {
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .recommendations {
            margin-top: 20px;
        }

        .recommendations h3 {
            color: #555;
        }

        .recommendations ul {
            list-style-position: inside;
        }

        .congratulations h3 {
            color: green;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Validación</h1>
    <div class="container">
        <?php if (!$submitted): ?>
            <form method="post">
                <!-- Módulo 1 -->
                <div class="box">
                    <h2>Módulo 1: Fundamentos Teóricos</h2>
                    <p>¿Qué representa un árbol de problemas en el análisis de sistemas?</p>
                    <input type="radio" name="q1" value="a" required> A) Una metodología para clasificar y priorizar defectos según su criticidad y frecuencia.<br>
                    <input type="radio" name="q1" value="b" required> B) Un diagrama que detalla la jerarquía y las interconexiones entre los diversos subsistemas.<br>
                    <input type="radio" name="q1" value="c" required> C) Una herramienta analítica que ayuda a visualizar y comprender las relaciones causa-efecto de problemas complejos.<br>

                    <p>¿Qué es el modelo RUP?</p>
                    <input type="radio" name="q2" value="a" required> A) Un marco de trabajo flexible para el desarrollo de software que adapta prácticas ágiles.<br>
                    <input type="radio" name="q2" value="b" required> B) Un enfoque iterativo e incremental que facilita la adaptación a cambios durante el ciclo de desarrollo.<br>
                    <input type="radio" name="q2" value="c" required> C) Un modelo estructurado que proporciona un proceso detallado y secuencial para cada fase del desarrollo.<br>

                    <p>La técnica "Flor de Loto" es utilizada para:</p>
                    <input type="radio" name="q3" value="a" required> A) Integrar la modelización de procesos empresariales con la innovación creativa.<br>
                    <input type="radio" name="q3" value="b" required> B) Propiciar un entorno de pensamiento divergente alrededor de un núcleo temático para explorar posibles soluciones.<br>
                    <input type="radio" name="q3" value="c" required> C) Estructurar y visualizar la interrelación entre diferentes conjuntos de datos en un proyecto de TI.<br>

                    <p>¿Cuál es el propósito principal de un modelo de negocios?</p>
                    <input type="radio" name="q4" value="a" required> A) Explicar detalladamente cada proceso interno de desarrollo y operaciones en una empresa.<br>
                    <input type="radio" name="q4" value="b" required> B) Describir cómo una empresa organiza sus recursos para crear, entregar y capturar valor en un mercado específico.<br>
                    <input type="radio" name="q4" value="c" required> C) Detallar los métodos para gestionar y reducir los costos operativos dentro de los proyectos de tecnología de información.<br>

                    <p>En el contexto del análisis de sistemas, los casos de uso se utilizan para:</p>
                    <input type="radio" name="q5" value="a" required> A) Representar interacciones detalladas entre los usuarios y el sistema para especificar requerimientos funcionales.<br>
                    <input type="radio" name="q5" value="b" required> B) Automatizar la transcripción de requisitos del usuario a código, minimizando errores de interpretación.<br>
                    <input type="radio" name="q5" value="c" required> C) Establecer configuraciones de red adecuadas basadas en los comportamientos de usuario típicos.<br>
                </div>

                <!-- Módulo 2 -->
                <div class="box">
                    <h2>Módulo 2: Herramientas y Tecnologías</h2>
                    <p>¿Qué metodología emplea el marco de trabajo Scrum?</p>
                    <input type="radio" name="q6" value="a" required> A) Un enfoque incremental y adaptativo que facilita la flexibilidad y respuesta ante cambios.<br>
                    <input type="radio" name="q6" value="b" required> B) Un método secuencial que garantiza la sistematización y previsibilidad del proceso de desarrollo.<br>
                    <input type="radio" name="q6" value="c" required> C) Una gestión paralela de tareas que permite el desarrollo simultáneo de múltiples componentes del software.<br>

                    <p>Una característica clave de Scrum es:</p>
                    <input type="radio" name="q7" value="a" required> A) La delimitación clara de las fases de desarrollo, asegurando un control exhaustivo de cada etapa.<br>
                    <input type="radio" name="q7" value="b" required> B) La organización del trabajo en ciclos cortos y repetitivos, fomentando la revisión continua y la adaptación.<br>
                    <input type="radio" name="q7" value="c" required> C) La concentración del análisis de requisitos al inicio del proyecto para minimizar cambios posteriores.<br>
                    <p>¿Qué herramienta se podría utilizar para la creación de diagramas de secuencia?</p>
                    <input type="radio" name="q8" value="a" required> A) Microsoft Excel, a través de la manipulación avanzada de gráficos y tablas.<br>
                    <input type="radio" name="q8" value="b" required> B) Microsoft Visio, ofreciendo funciones específicas para el diseño y modelado de diagramas.<br>
                    <input type="radio" name="q8" value="c" required> C) Microsoft Word, utilizando complementos para la inserción y edición de elementos gráficos complejos.<br>

                    <p>¿Cuál de las siguientes es una herramienta efectiva para la gestión de configuraciones en el desarrollo de software?</p>
                    <input type="radio" name="q9" value="a" required> A) Git.<br>
                    <input type="radio" name="q9" value="b" required> B) Jenkins<br>
                    <input type="radio" name="q9" value="c" required> C) Docker<br>

                    <p> Un diagrama de secuencia es útil para mostrar:</p>
                    <input type="radio" name="q10" value="a" required> A) Las interacciones temporales y secuenciales entre objetos dentro de un escenario específico.<br>
                    <input type="radio" name="q10" value="b" required> B) La disposición estática y las relaciones de dependencia entre los diferentes objetos del sistema.<br>
                    <input type="radio" name="q10" value="c" required> C) Los diferentes caminos de decisión y sus consecuencias en el flujo de ejecución del software.<br>

                    <h2>Módulo 3: Aplicación Práctica y Resolución de Problemasa</h2>
                    <p>Al encontrar requisitos contradictorios durante el análisis, ¿qué debería hacer un analista de sistemas?</p>
                    <input type="radio" name="q11" value="a" required> A) Posponer la resolución de contradicciones hasta obtener un entendimiento más completo del sistema.<br>
                    <input type="radio" name="q11" value="b" required> B) Involucrar activamente a los stakeholders para resolver discrepancias y definir prioridades claramente..<br>
                    <input type="radio" name="q11" value="c" required> C) Seleccionar los requisitos que mejor se alineen con la arquitectura técnica propuesta, independientemente de otras consideraciones.<br>

                    <p> Si un cliente no puede articular claramente sus necesidades, ¿qué técnica sería efectiva para recolectar requisitos?</p>
                    <input type="radio" name="q12" value="a" required> A) Desarrollar un prototipo funcional para facilitar la comprensión y refinamiento de los requisitos por parte del cliente.<br>
                    <input type="radio" name="q12" value="b" required> B) Distribuir cuestionarios detallados que permitan al cliente reflexionar y especificar sus necesidades con mayor claridad.<br>
                    <input type="radio" name="q12" value="c" required> C) Esperar a que el cliente defina completamente sus expectativas antes de proceder con el diseño del sistema.<br>

                    <p>Durante un sprint en Scrum, se encuentra que una funcionalidad planeada no es técnicamente factible. ¿Cuál es el siguiente paso adecuado?</p>
                    <input type="radio" name="q13" value="a" required> A) Mantener el curso del desarrollo mientras se exploran posibles soluciones en iteraciones futuras.<br>
                    <input type="radio" name="q13" value="b" required> B) Pausar el desarrollo de esa funcionalidad específica mientras se evalúan alternativas técnicas viables.<br>
                    <input type="radio" name="q13" value="c" required> C) Discutir las opciones viables en una reunión de equipo y adaptar el plan de desarrollo según las nuevas circunstancias.<br>

                    <p>En el marco de Scrum, si se identifica una discrepancia entre los requisitos documentados y las necesidades reales del cliente durante un sprint, ¿cuál es el procedimiento adecuado?</p>
                    <input type="radio" name="q14" value="a" required> A) Seguir desarrollando conforme a los requisitos documentados, mientras se prepara una propuesta de ajuste para el próximo sprint.<br>
                    <input type="radio" name="q14" value="b" required> B) Convocar una reunión de revisión inmediata con el cliente para realinear los requisitos y expectativas.<br>
                    <input type="radio" name="q14" value="c" required> C) Registrar la discrepancia como un ítem de acción para la próxima retrospectiva de sprint, asegurando que se discuta y resuelva adecuadamente.<br>

                    <p> ¿Cómo puede un analista de sistemas asegurar que las soluciones propuestas sean inclusivas y accesibles para todos los usuarios?</p>
                    <input type="radio" name="q15" value="a" required> A) Conduciendo sesiones de pruebas enfocadas tanto en usuarios internos como externos para asegurar un amplio espectro de accesibilidad.<br>
                    <input type="radio" name="q15" value="b" required> B) Priorizando las características de accesibilidad únicamente cuando estas no interfieran con la funcionalidad principal del sistema.<br>
                    <input type="radio" name="q15" value="c" required> C) Aplicando principios de diseño universal, realizando pruebas exhaustivas de accesibilidad, e incorporando retroalimentación de una diversidad de usuarios.<br>

                    <h2>Módulo 4: Aspectos Éticos y Profesionales</h2>
                    <p>¿Cuál de las siguientes es una preocupación ética importante en el análisis de sistemas?</p>
                    <input type="radio" name="q16" value="a" required> A) El impacto visual y la percepción de la interfaz de usuario en diversos grupos demográficos.<br>
                    <input type="radio" name="q16" value="b" required> B) Asegurar la protección efectiva de la información personal y mantener la confidencialidad de los datos del usuario.<br>
                    <input type="radio" name="q16" value="c" required> C) La elección de tecnologías y lenguajes que promuevan prácticas de desarrollo sostenible y responsable.<br>

                    <p> En términos de ética profesional, ¿qué se espera de un analista de sistemas?</p>
                    <input type="radio" name="q17" value="a" required> A) Mantener una comunicación transparente y veraz, asegurando que todas las partes interesadas comprendan el alcance y las limitaciones del proyecto.<br>
                    <input type="radio" name="q17" value="b" required> B) Esforzarse por incorporar las últimas innovaciones tecnológicas para mantener la competitividad del proyecto.<br>
                    <input type="radio" name="q17" value="c" required> C) Minimizar la documentación en pro de acelerar las entregas, siempre que se cumplan los requisitos mínimos de calidad.<br>

                    <p>Si un analista descubre que la recopilación de datos viola las regulaciones de privacidad, ¿qué debería hacer?</p>
                    <input type="radio" name="q18" value="a" required> A) Informar a la dirección sobre la infracción y colaborar en el desarrollo de un plan de acción que cumpla con la legislación aplicable.<br>
                    <input type="radio" name="q18" value="b" required> B) Dejar la responsabilidad de la resolución a otro departamento más especializado en asuntos legales o de cumplimiento.<br>
                    <input type="radio" name="q18" value="c" required> C) Intentar una solución interna que minimice la visibilidad del problema sin necesariamente resolver la infracción de fondo.<br>


                    <p> ¿Qué implicaciones tiene el no seguir las mejores prácticas y estándares en el análisis de sistemas?</p>
                    <input type="radio" name="q19" value="a" required> A) Puede generar un ambiente de trabajo más relajado pero a costa de aumentar el riesgo de errores y fallos de seguridad.<br>
                    <input type="radio" name="q19" value="b" required> B) Conduce a problemas de calidad, fallos de seguridad y potenciales infracciones legales, comprometiendo la integridad del proyecto.<br>
                    <input type="radio" name="q19" value="c" required> C) Facilita entregas más rápidas, aunque con una posible disminución en la sostenibilidad y robustez del sistema a largo plazo.<br>

                    <p>En el análisis de sistemas, ¿por qué es crucial considerar las implicaciones sociales de la tecnología implementada?</p>
                    <input type="radio" name="q20" value="a" required> A) Para prevenir que la solución tecnológica introduzca o exacerbe desigualdades, asegurando que beneficie equitativamente a todos los sectores de la sociedad.<br>
                    <input type="radio" name="q20" value="b" required> B) Para maximizar el retorno sobre la inversión al satisfacer las demandas de un mercado más amplio y diverso.<br>
                    <input type="radio" name="q20" value="c" required> C) Para simplificar los procesos de implementación y mantenimiento ajustándose a las normativas sociales vigentes.<br>

                    <input type="submit" value="Enviar respuestas">
            </form>
    </div>
<?php else: ?>
    <div class="container">
        <h2>Resultados de la Encuesta</h2>
        <div class="result-box">
            <h3>Resultados por Módulo:</h3>
            <p>Módulo 1 Recomendaciones Fundamentos Teóricos: <?php echo $puntajes['Modulo1']; ?> /5</p>
            <p>Módulo 2 Recomendaciones Herramientas y Tecnologías: <?php echo $puntajes['Modulo2']; ?>/5</p>
            <p>Módulo 3 Recomendaciones Aplicación Práctica y Resolución de Problemas: <?php echo $puntajes['Modulo3']; ?>/5</p>
            <p>Módulo 4 Aplicación Aspectos Éticos y Profesionales: <?php echo $puntajes['Modulo4']; ?>/5</p>
            <h3>Puntaje Total: <?php echo $total_general; ?>/20</h3>
            <?php if ($puntajes['Modulo1'] == 5 && $puntajes['Modulo2'] == 5 && $puntajes['Modulo3'] == 5 && $puntajes['Modulo4'] == 5): ?>
                <div class="congratulations">
                    <h3>Felicitaciones, tienes excelentes conocimientos, sigue estudiando!</h3>
                </div>
            <?php endif; ?>
            <!-- Condiciones para mostrar recomendaciones si hay 2 o más respuestas incorrectas -->
            <?php if ($puntajes['Modulo1'] <= 3): ?>
                <div class="recommendations">
                    <h3>Recomendaciones Fundamentos Teóricos</h3>
                    <ul>
                        <li>Revisión de conceptos clave: Vuelve a leer tus apuntes o los textos de referencia sobre los temas fundamentales como árboles de problemas, RUP, y modelos de negocios. Asegúrate de que entiendes bien los términos y sus aplicaciones.</li>
                        <li>Estudio de casos prácticos: Busca ejemplos reales o estudios de caso que ilustren cómo se utilizan estas herramientas y conceptos en la práctica. Esto puede ayudarte a visualizar mejor su aplicación y relevancia.</li>
                        <li>Diálogos y discusiones: Si es posible, discute estos temas con compañeros o mentores. A menudo, explicar los conceptos a otros puede ayudar a aclarar tus propias dudas.</li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ($puntajes['Modulo2'] <= 3): ?>
                <div class="recommendations">
                    <h3>Recomendaciones Herramientas y Tecnologías</h3>
                    <ul>
                        <li>Familiarízate con los principios del desarrollo ágil y cómo se aplica en diferentes contextos. Es recomendable practicar la organización del trabajo en ciclos cortos y repetitivos.</li>
                        <li>Utiliza Microsoft Visio para el diseño y modelado de diagramas y aprende a usar Git para el control de versiones y colaboración en el código fuente.</li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ($puntajes['Modulo3'] <= 3): ?>
                <div class="recommendations">
                    <h3>Recomendaciones Aplicación Práctica y Resolución de Problemas</h3>
                    <ul>
                        <li>Realiza ejercicios de simulación donde tú y tus compañeros asumen diferentes roles en un proyecto, desde analistas de sistemas hasta clientes y usuarios finales.</li>
                        <li>Practica el desarrollo de prototipos rápidos para entender mejor cómo iterar sobre los requisitos y el diseño en respuesta a la retroalimentación.</li>
                        <li>Presenta tus soluciones a instructores o colegas para obtener retroalimentación constructiva que te ayude a mejorar tus enfoques de resolución de problemas.</li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ($puntajes['Modulo4'] <= 3): ?>
                <div class="recommendations">
                    <h3>Recomendaciones Aplicación Aspectos Éticos y Profesionales</h3>
                    <ul>
                        <li>Asegúrate de entender la importancia de la protección de la información personal y la confidencialidad de los datos del usuario.</li>
                        <li>Participa en debates o foros sobre los dilemas éticos en la tecnología para explorar diferentes perspectivas y soluciones propuestas.</li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

</div>
</body>

</html>