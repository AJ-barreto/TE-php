<?php
$respuestas_correctas = array(
    'Modulo1' => array(
        'q1' => 'b',
        'q2' => 'c',
        'q3' => 'b',
        'q4' => 'b',
        'q5' => 'a',
    ),
    'Modulo2' => array(
        'q6' => 'b',
        'q7' => 'a',
        'q8' => 'b',
        'q9' => 'b',
        'q10' => 'a',
    ),
    'Modulo3' => array(
        'q11' => 'b',
        'q12' => 'b',
        'q13' => 'a',
        'q14' => 'b',
        'q15' => 'a',
    ),
    'Modulo4' => array(
        'q16' => 'b',
        'q17' => 'b',
        'q18' => 'b',
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
                    <h2>Módulo 1: Percepción de la Facilidad de Uso</h2>
                    <p>¿Qué función de JIRA facilita la organización de tareas en un proyecto?</p>
                    <input type="radio" name="q1" value="a" required> A) Chat en tiempo real.<br>
                    <input type="radio" name="q1" value="b" required> B) Tableros Kanban y Scrum.<br>
                    <input type="radio" name="q1" value="c" required> C) Herramientas de diseño gráfico.<br>

                    <p>¿Cómo se puede asignar una tarea a un miembro del equipo en JIRA?</p>
                    <input type="radio" name="q2" value="a" required> A) Enviando un correo electrónico.<br>
                    <input type="radio" name="q2" value="b" required> B) Usando la funcionalidad de etiquetado.<br>
                    <input type="radio" name="q2" value="c" required> C) Asignando directamente desde la tarjeta de tarea.<br>

                    <p>¿Cuál es una característica clave de JIRA para el seguimiento del progreso del proyecto?</p>
                    <input type="radio" name="q3" value="a" required> A) Creación de páginas web.<br>
                    <input type="radio" name="q3" value="b" required> B) Informes y gráficos de avance.<br>
                    <input type="radio" name="q3" value="c" required> C) Edición de documentos colaborativos.<br>

                    <p>¿Qué permite la funcionalidad de "drag and drop" en JIRA?</p>
                    <input type="radio" name="q4" value="a" required> A) Adjuntar archivos a tareas.<br>
                    <input type="radio" name="q4" value="b" required> B) Reasignar tareas entre diferentes etapas del proyecto.<br>
                    <input type="radio" name="q4" value="c" required> C) Modificar el diseño del tablero.<br>

                    <p>¿Cómo se puede buscar rápidamente una tarea específica en JIRA?</p>
                    <input type="radio" name="q5" value="a" required> A) Usando el motor de búsqueda integrado.<br>
                    <input type="radio" name="q5" value="b" required> B) Revisando todas las tareas manualmente.<br>
                    <input type="radio" name="q5" value="c" required> C) Consultando a un supervisor.<br>
                </div>

                <!-- Módulo 2 -->
                <div class="box">
                    <h2>Módulo 2: Percepción de la Utilidad</h2>
                    <p>¿Cuál es el principal beneficio de usar JIRA en la gestión de proyectos?</p>
                    <input type="radio" name="q6" value="a" required> A) Crear presentaciones visuales.<br>
                    <input type="radio" name="q6" value="b" required> B) Mejorar la visibilidad y control del progreso del proyecto.<br>
                    <input type="radio" name="q6" value="c" required> C) Organizar eventos sociales.<br>

                    <p>¿Cómo ayuda JIRA en la identificación de obstáculos en el proyecto?</p>
                    <input type="radio" name="q7" value="a" required> A) Generando alertas automáticas sobre bloqueos.<br>
                    <input type="radio" name="q7" value="b" required> B) Creando gráficos de dispersión.<br>
                    <input type="radio" name="q7" value="c" required> C) Organizando reuniones automáticas.<br>

                    <p>¿Qué función de JIRA es útil para realizar estimaciones de tiempo y recursos?</p>
                    <input type="radio" name="q8" value="a" required> A) Gestión de usuarios.<br>
                    <input type="radio" name="q8" value="b" required> B) Tableros de planificación y sprints.<br>
                    <input type="radio" name="q8" value="c" required> C) Edición de fotos.<br>

                    <p>¿Cómo facilita JIRA la colaboración entre equipos?</p>
                    <input type="radio" name="q9" value="a" required> A) Mediante la creación de blogs.<br>
                    <input type="radio" name="q9" value="b" required> B) A través de comentarios y actualizaciones en tiempo real en las tareas.<br>
                    <input type="radio" name="q9" value="c" required> C) Compartiendo memes.<br>

                    <p>¿Cuál es una ventaja de los informes generados por JIRA?</p>
                    <input type="radio" name="q10" value="a" required> A) Personalización para diferentes necesidades de los stakeholders.<br>
                    <input type="radio" name="q10" value="b" required> B) Capacidad de crear música de fondo para presentaciones.<br>
                    <input type="radio" name="q10" value="c" required> C) Diseño gráfico avanzado.<br>

                    <h2>Módulo 3: Intención de Uso</h2>
                    <p>¿Por qué un gerente de proyectos debería considerar el uso de JIRA?</p>
                    <input type="radio" name="q11" value="a" required> A) Porque es una red social popular.<br>
                    <input type="radio" name="q11" value="b" required> B) Porque proporciona herramientas robustas para la gestión y seguimiento de proyectos.<br>
                    <input type="radio" name="q11" value="c" required> C) Porque permite la transmisión de videos en vivo.<br>

                    <p>¿Cómo puede JIRA influir en la adopción de metodologías ágiles?</p>
                    <input type="radio" name="q12" value="a" required> A) Permitiendo la gestión de dietas.<br>
                    <input type="radio" name="q12" value="b" required> B) Facilitando la planificación y ejecución de sprints.<br>
                    <input type="radio" name="q12" value="c" required> C) Creando aplicaciones móviles.<br>

                    <p>¿Qué aspecto de JIRA puede mejorar la eficiencia del equipo?</p>
                    <input type="radio" name="q13" value="a" required> A) Las opciones de personalización de los informes.<br>
                    <input type="radio" name="q13" value="b" required> B) Las capacidades de transmisión en vivo.<br>
                    <input type="radio" name="q13" value="c" required> C) La edición de video en línea.<br>

                    <p>¿Cómo puede JIRA ayudar en la priorización de tareas?</p>
                    <input type="radio" name="q14" value="a" required> A) Organizando tareas en eventos.<br>
                    <input type="radio" name="q14" value="b" required> B) Usando tableros Kanban y Scrum para visualizar prioridades.<br>
                    <input type="radio" name="q14" value="c" required> C) Creando encuestas entre el equipo.<br>

                    <p>¿Qué impacto tiene el uso de JIRA en la transparencia del proyecto?</p>
                    <input type="radio" name="q15" value="a" required> A) Aumenta la visibilidad del progreso y problemas potenciales.<br>
                    <input type="radio" name="q15" value="b" required> B) Mejora la calidad de las videoconferencias.<br>
                    <input type="radio" name="q15" value="c" required> C) Facilita la creación de arte digital.<br>

                    <h2>Módulo 4: Actitud hacia el Uso</h2>
                    <p>¿Cuál es una razón común por la que los equipos disfrutan usando JIRA?</p>
                    <input type="radio" name="q16" value="a" required> A) Su integración con herramientas de diseño gráfico.<br>
                    <input type="radio" name="q16" value="b" required> B) Su interfaz intuitiva y fácil de usar.<br>
                    <input type="radio" name="q16" value="c" required> C) Su capacidad para reproducir música.<br>

                    <p>¿Qué característica de JIRA es valorada por los desarrolladores de software?</p>
                    <input type="radio" name="q17" value="a" required> A) Sus plantillas de diseño de moda.<br>
                    <input type="radio" name="q17" value="b" required> B) Sus funcionalidades de seguimiento de bugs e incidencias.<br>
                    <input type="radio" name="q17" value="c" required> C) Sus capacidades de edición de video.<br>

                    <p>¿Por qué los gerentes de proyecto prefieren JIRA para la gestión de proyectos?</p>
                    <input type="radio" name="q18" value="a" required> A) Porque permite hacer encuestas de satisfacción.<br>
                    <input type="radio" name="q18" value="b" required> B) Porque ofrece una excelente visibilidad y control sobre las tareas del proyecto.<br>
                    <input type="radio" name="q18" value="c" required> C) Porque puede crear animaciones 3D.<br>


                    <p>¿Qué función de JIRA mejora la resolución de problemas en el proyecto?</p>
                    <input type="radio" name="q19" value="a" required> A) Su capacidad para crear memes.<br>
                    <input type="radio" name="q19" value="b" required> B) Su sistema de tickets y seguimiento de problemas.<br>
                    <input type="radio" name="q19" value="c" required> C) Su integración con aplicaciones de fitness.<br>

                    <p>¿Qué beneficio reportan los equipos al usar JIRA?</p>
                    <input type="radio" name="q20" value="a" required> A) Mejora en la comunicación y colaboración.<br>
                    <input type="radio" name="q20" value="b" required> B) Aumento en la cantidad de memes compartidos.<br>
                    <input type="radio" name="q20" value="c" required> C) Mayor capacidad para hacer transmisiones en vivo.<br>

                    <input type="submit" value="Enviar respuestas">
            </form>
    </div>
<?php else: ?>
    <div class="container">
        <h2>Resultados de la Encuesta</h2>
        <div class="result-box">
            <h3>Resultados por Módulo:</h3>
            <p>Módulo 1, Fundamentos Teóricos: <?php echo $puntajes['Modulo1']; ?> /5</p>
            <p>Módulo 2, Prácticas y Herramientas: <?php echo $puntajes['Modulo2']; ?>/5</p>
            <p>Módulo 3, Casos de Estudio: <?php echo $puntajes['Modulo3']; ?>/5</p>
            <p>Módulo 4, Gestión y Mejora Continua: <?php echo $puntajes['Modulo4']; ?>/5</p>
            <h3>Puntaje Total: <?php echo $total_general; ?>/20</h3>
            <?php if ($puntajes['Modulo1'] == 5 && $puntajes['Modulo2'] == 5 && $puntajes['Modulo3'] == 5 && $puntajes['Modulo4'] == 5): ?>
                <div class="congratulations">
                    <h3>Felicitaciones, tienes excelentes conocimientos, sigue estudiando!</h3>
                </div>
            <?php endif; ?>
            <!-- Condiciones para mostrar recomendaciones si hay 2 o más respuestas incorrectas -->
            <?php if ($puntajes['Modulo1'] <= 3): ?>
                <div class="recommendations">
                    <h3>Recomendaciones Percepción de la Facilidad de Uso</h3>
                    <ul>
                        <li>Dado que has obtenido un puntaje bajo en el módulo de Percepción de la Facilidad de Uso, te aconsejamos que te familiarices con los conceptos básicos y las funcionalidades clave de JIRA.</li>
                        <li>En particular, enfócate en entender cómo los tableros Kanban y Scrum facilitan la organización de tareas, cómo asignar tareas a los miembros del equipo directamente desde la tarjeta de tarea, y cómo utilizar los informes y gráficos de JIRA para hacer seguimiento del progreso del proyecto.</li>
                        <li>También te recomendamos practicar con la funcionalidad de "drag and drop" para reasignar tareas y utilizar el motor de búsqueda integrado para encontrar tareas específicas rápidamente. Puedes revisar tutoriales y la documentación oficial de JIRA, además de participar en cursos y webinars que te ayuden a mejorar tu comprensión y uso de la herramienta.</li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ($puntajes['Modulo2'] <= 3): ?>
                <div class="recommendations">
                    <h3>Recomendaciones Percepción de la Utilidad</h3>
                    <ul>
                        <li>Si has obtenido un puntaje bajo en el módulo de Percepción de la Utilidad, es fundamental que explores cómo JIRA puede ser una herramienta útil para la gestión de proyectos. </li>
                        <li>Familiarízate con las características que permiten un seguimiento eficiente del tiempo y los recursos, la gestión de dependencias entre tareas, y la creación de informes detallados que ayudan en la toma de decisiones.</li>
                        <li>Enfócate en aprender a configurar notificaciones y alertas para mantener a tu equipo informado, y aprovecha las integraciones de JIRA con otras herramientas de gestión y comunicación. Participar en casos prácticos y estudios de caso te ayudará a visualizar mejor cómo aplicar estas funcionalidades en proyectos reales.</li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ($puntajes['Modulo3'] <= 3): ?>
                <div class="recommendations">
                    <h3>Recomendaciones Facilidad de Aprendizaje</h3>
                    <ul>
                        <li>Para mejorar en el módulo de Facilidad de Aprendizaje, te sugerimos que te involucres en actividades que faciliten un aprendizaje más profundo de JIRA.</li>
                        <li>Esto incluye realizar ejercicios prácticos que simulen diferentes roles en un proyecto, desde analistas de sistemas hasta clientes y usuarios finales.</li>
                        <li>Practica el desarrollo de prototipos rápidos y obtén retroalimentación constructiva de tus soluciones para iterar y mejorar continuamente. También es útil participar en foros y comunidades de usuarios de JIRA, donde puedes compartir experiencias y aprender de las mejores prácticas y consejos de otros profesionales.</li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ($puntajes['Modulo4'] <= 3): ?>
                <div class="recommendations">
                    <h3>Recomendaciones Satisfacción del Usuario</h3>
                    <ul>
                        <li>Si tu puntaje en el módulo de Satisfacción del Usuario es bajo, enfócate en comprender la importancia de la experiencia del usuario en la gestión de proyectos con JIRA.</li>
                        <li>Es crucial que entiendas cómo personalizar el entorno de JIRA para satisfacer las necesidades específicas de tu equipo y proyecto.</li>
                        <li>Aprende a configurar paneles y filtros personalizados que hagan más fácil y eficiente la navegación y el acceso a la información relevante.</li>
                        <li>Además, asegúrate de que todos los miembros del equipo estén capacitados en el uso de JIRA y conozcan las mejores prácticas para su uso. Realiza encuestas de satisfacción periódicas para recoger feedback y realizar mejoras continuas en la implementación de JIRA.</li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

</div>
</body>

</html>