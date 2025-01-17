<?php
//session_start(); 

//include_once '../Modelo/Empleado.php'; 

$emp = $_SESSION['usuario'];

if (isset($_SESSION['usuario'])) {
    $emp = $_SESSION['usuario']; // Recuperar el objeto usuario de la sesión
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Información Proyecto</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="../vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="../css/style.css" rel="stylesheet">

        <!-- =======================================================
        * Template Name: Medilab
        * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
        * Updated: Mar 17 2024 with Bootstrap v5.3.3
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>
    <body>

        <!-- ======= Top Bar ======= -->

        <div id="topbar" class="d-flex align-items-center fixed-top">
            <div class="container d-flex justify-content-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
                    <i class="bi bi-phone"></i> +1 5589 55488 55
                </div>
                <div class="d-none d-lg-flex social-links align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
                </div>
            </div>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li class="dropdown"><a href="#"><span>Notificaciones</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="Notificaciones.jsp">Ver Actualizaciones</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto active" href="Controlador?menu=Enlace&accion=Listar">Guias y Documentacion</a></li>
                    <li><a class="nav-link scrollto" href="#about"></a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>

        <!-- ======= Header ======= -->
        <!--
        <header id="header" class="fixed-top">
          <div class="container d-flex align-items-center">
      
            <h1 class="logo me-auto"><a href="index.html">Medilab</a></h1>
            Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <!--
              <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                  <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                  <li><a class="nav-link scrollto" href="#about">About</a></li>
                  <li><a class="nav-link scrollto" href="#services">Services</a></li>
                  <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
                  <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
                  <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <li><a href="#">Drop Down 1</a></li>
                      <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                          <li><a href="#">Deep Drop Down 1</a></li>
                          <li><a href="#">Deep Drop Down 2</a></li>
                          <li><a href="#">Deep Drop Down 3</a></li>
                          <li><a href="#">Deep Drop Down 4</a></li>
                          <li><a href="#">Deep Drop Down 5</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Drop Down 2</a></li>
                      <li><a href="#">Drop Down 3</a></li>
                      <li><a href="#">Drop Down 4</a></li>
                    </ul>
                  </li>
                  <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
              </nav> .navbar -->
        <!--
        <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>
    
      </div>
    </header> End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container">
                <h1>Tutorial Educativo De Jira</h1>
            </div>
        </section><!-- End Hero -->

        <main id="main">

            <!-- ======= Why Us Section ======= -->
            <section id="why-us" class="why-us">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="content">
                                <h3>¿Por qué Jira?</h3>
                                <p>
                                    Jira es una herramienta de gestión de proyectos ampliamente utilizada por su capacidad para organizar tareas, mejorar la colaboración entre equipos y proporcionar una visión clara del progreso del proyecto. Con características como seguimiento de problemas, asignación de tareas y generación de informes, Jira ayuda a los equipos a trabajar de manera más eficiente y a cumplir con los plazos de manera más efectiva.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-8 d-flex align-items-stretch">
                            <div class="icon-boxes d-flex flex-column justify-content-center">
                                <div class="row">
                                    <div class="col-xl-4 d-flex align-items-stretch">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            <i class="bx bx-receipt"></i>
                                            <h4>Gestión centralizada</h4>
                                            <p>Jira ofrece una plataforma centralizada para gestionar tareas, proyectos e incidencias, lo que facilita la organización y el seguimiento de actividades en un solo lugar.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 d-flex align-items-stretch">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            <i class="bx bx-cube-alt"></i>
                                            <h4>Flexibilidad y personalización</h4>
                                            <p>Con Jira, es posible adaptar los flujos de trabajo, campos y paneles según las necesidades específicas del equipo o proyecto, lo que permite una mayor flexibilidad y eficiencia en la gestión de proyectos.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 d-flex align-items-stretch">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            <i class="bx bx-receipt"></i>
                                            <h4>Colaboración efectiva</h4>
                                            <p>Jira fomenta la colaboración entre equipos al facilitar la asignación de tareas, el seguimiento del progreso y la comunicación en tiempo real, lo que mejora la coordinación y el trabajo en equipo para lograr objetivos comunes de manera más efectiva.</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End .content-->
                        </div>
                    </div>

                </div>
            </section><!-- End Why Us Section -->

            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">

                        </div>

                        <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                            <h3>Objetivos</h3>
                            <p>Diseñar un tutorial educativo para apoyar el aprendizaje de la herramienta de gestión de proyectos Jira.</p>

                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <p class="description">Realizar un análisis detallado de los usuarios potenciales de la aplicación, identificando sus necesidades, nivel de experiencia con Jira y preferencias de aprendizaje.</p>
                            </div>

                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <p class="description">Diseñar un apartado dentro del portal web para brindar toda la información acerca del proyecto, allí se almacenará el resumen de lo que hace la aplicación y el porcentaje de desarrollo completado del proyecto.</p>
                            </div>

                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <p class="description">Crear lecciones que cubran desde los conceptos básicos hasta los avanzados de Jira, asegurándose de incluir ejemplos prácticos. </p>
                            </div>

                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <p class="description">Brindar material de apoyo externo para el usuario mediante links y experiencias de uso (comentarios que hacen las personas acerca de contenido que ha sido de utilidad).</p>
                            </div>

                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <p class="description">Desarrollar un algoritmo que recomiende contenido específico basado en el nivel de experiencia y las preferencias de aprendizaje de cada usuario.</p>
                            </div>

                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <p class="description">   Implementar el modelo de validación TAM para medir el grado de aceptación del proyecto.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </section><!-- End About Section -->

            <!-- ======= Counts Section ======= -->
            <section id="counts" class="counts">
                <div class="container">

                    <div class="row">

                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Módulo 1</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                            <div class="count-box">
                                <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Módulo 2</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                            <div class="count-box">
                                <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Módulo 3</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                            <div class="count-box">
                                <span data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Módulo 4</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Counts Section -->

            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
                <div class="container">

                    <div class="section-title">
                        <h2>Descripción</h2>
                        <p>Los estudiantes de la Facultad Tecnológica muestran un interés especial en las herramientas de gestión de proyectos, buscando adquirir habilidades en planificación, ejecución y supervisión de proyectos no solo para tener una buena base en esta habilidad, sino también para desarrollar de una manera más eficiente y óptima sus proyectos de grado o de software. Este interés sugiere una inclinación hacia roles de liderazgo, la capacidad de trabajar en equipo, asumir responsabilidades, resolver problemas y tomar decisiones críticas. En esencia, están comprometidos con el aprendizaje continuo y la mejora de sus habilidades en tecnología y gestión de proyectos, preparándose para carreras exitosas en el campo tecnológico, sin embargo, se ha notado que cuando los estudiantes de la facultad llegan a los últimos semestres de sus carreras no cuentan con las habilidades mencionadas anteriormente y tampoco saben de recursos tecnológicos que los apoyen en su proceso de realización de proyectos de grado y cuando encuentran una herramienta, desconocen cómo usarla adecuadamente ya que por lo general la mayoría de estos recursos cuentan con múltiples funcionalidades.</p>
                    </div>
                </div>

                </div>
            </section><!-- End Services Section -->
            <!-- ======= Doctors Section ======= -->
            <section id="doctors" class="doctors">
                <div class="container">

                    <div class="section-title">
                        <h2>Integrantes</h2>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="member d-flex align-items-start">
                                <div class="pic"><img src="img/yo.jpg" class="img-fluid" alt=""></div>
                                <div class="member-info">
                                    <h4>Camilo Guasca</h4>
                                    <div class="social">
                                        <a href=""><i class="ri-twitter-fill"></i></a>
                                        <a href=""><i class="ri-facebook-fill"></i></a>
                                        <a href=""><i class="ri-instagram-fill"></i></a>
                                        <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-4 mt-lg-0">
                            <div class="member d-flex align-items-start">
                                <div class="pic"><img src="img/Foto Andrés Cara.jpeg" class="img-fluid" alt=""></div>
                                <div class="member-info">
                                    <h4>Andrés Barreto</h4>
                                    <div class="social">
                                        <a href=""><i class="ri-twitter-fill"></i></a>
                                        <a href=""><i class="ri-facebook-fill"></i></a>
                                        <a href=""><i class="ri-instagram-fill"></i></a>
                                        <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section><!-- End Doctors Section -->
            <div class="row">
                <div class="col-xl-3 col-lg-1 d-flex justify-content-center align-items-stretch position-relative">

                </div>

                <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                    <h3>Actualización 1.0</h3>
                    <p>Inicio del Proyecto</p>

                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-atom"></i></div>
                        <p class="description">Recolección de requisitos.</p>
                    </div>

                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-atom"></i></div>
                        <p class="description">Análisis de necesidades del usuario.</p>
                    </div>

                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-atom"></i></div>
                        <p class="description">Diseño de la arquitectura del sistema.</p>
                    </div>

                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-atom"></i></div>
                        <p class="description">Definición del alcance y cronograma del proyecto.</p>
                    </div>
                </div>
            </div>
            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container">
                    <div class="row mt-3">

                        <<div class="container">

                            <div class="section-title">
                                <h2>Comentarios</h2>
                                <p>En esta sección puede agregar comentarios</p>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row mt-3">

                                <div class="col-lg-2">
                                    <div class="info">
                                        <div class="address">


                                        </div>

                                        <div class="email">

                                        </div>

                                        <div class="phone">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-8 mt-5 mt-lg-0">

                                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Usuario" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <textarea class="form-control" name="message" rows="5" placeholder="Comentario" required></textarea>
                                        </div>
                                        <div class="my-3">
                                            <div class="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Your message has been sent. Thank you!</div>
                                        </div>
                                        <div class="text-center"><button type="submit">Enviar</button></div>
                                    </form>

                                </div>

                            </div>

                        </div>
                        <div class="container">

                            <div class="section-title">
                                <h2>Cambios</h2>
                                <p>En esta sección puede agregar cambios en el desarrollo del proyecto</p>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row mt-3">

                                <div class="col-lg-2">
                                    <div class="info">
                                        <div class="address">


                                        </div>

                                        <div class="email">

                                        </div>

                                        <div class="phone">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-8 mt-5 mt-lg-0">

                                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Modulo" required>
                                            </div>
                                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Porcentaje" required>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Encargados" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <textarea class="form-control" name="message" rows="5" placeholder="Descripción" required></textarea>
                                        </div>
                                        <div class="my-3">
                                            <div class="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Your message has been sent. Thank you!</div>
                                        </div>
                                        <div class="text-center"><button type="submit">Enviar</button></div>
                                    </form>

                                </div>

                            </div>

                        </div>
                        </section><!-- End Contact Section -->

                        </main><!-- End #main -->

                        <!-- ======= Footer ======= -->
                        <footer id="footer">



                            <div class="container d-md-flex py-4">

                                <div class="me-md-auto text-center text-md-start">
                                    <div class="copyright">

                                    </div>
                                    <div class="credits">
                                    </div>
                                </div>
                                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                                </div>
                            </div>
                        </footer><!-- End Footer -->

                        <div id="preloader"></div>
                        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

                        <!-- Vendor JS Files -->
                        <script src="../vendor/purecounter/purecounter_vanilla.js"></script>
                        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <script src="../vendor/glightbox/js/glightbox.min.js"></script>
                        <script src="../vendor/swiper/swiper-bundle.min.js"></script>
                        <script src="../vendor/php-email-form/validate.js"></script>

                        <!-- Template Main JS File -->
                        <script src="../js/main.js"></script>

                        </body>
                        </html>
                        <?php
} else {
    // Redirigir al controlador principal si no está autenticado
    header("Location: controlador/controlador.php?menu=Principal");
    exit();
}
?>
