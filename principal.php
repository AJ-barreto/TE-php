        <?php
        include_once 'Modelo/Empleado.php';
        require_once 'config/Conexion.php';
        session_start();
        $emp = $_SESSION['usuario'];
        
        $rol = $emp->getEstado();
        
        

        if ($emp != null) {


            $conexion = new Conexion();
            $conn = $conexion->getConexion();

            $stmt = $conn->prepare("SELECT titulo, descripcion, fecha FROM notificaciones ORDER BY fecha DESC");
            $stmt->execute();
            $result = $stmt->get_result();
        ?>
            <!DOCTYPE html>
            <html>

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                <title>Home</title>
            </head>

            <body>
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item" class="d-flex">
                                <img src="https://static.vecteezy.com/system/resources/previews/010/151/174/non_2x/house-and-home-icon-symbol-sign-free-png.png" alt="Casa" width="30" align="right">
                                <a style="margin-left: 10px; border: none" class="btn btn-outline-light" href="controlador/controlador.php?menu=Home" target="myFrame">Home</a>
                            </li>
                            <li class="nav-item">
                                <img src="https://cdn-icons-png.flaticon.com/512/5988/5988411.png" alt="Casa" width="30" align="right">
                                <a style="margin-left: 10px; border: none" class="btn btn-outline-light" href="controlador/controlador.php?menu=Enlace&accion=Listar" target="myFrame">Enlaces</a>
                            </li>
                            <li class="nav-item">
                                <img src="https://cdn-icons-png.flaticon.com/512/175/175141.png" alt="Casa" width="30" align="right">
                                <a style="margin-left: 10px; border: none" class="btn btn-outline-light" href="controlador/controlador.php?menu=InformacionProyecto" target="myFrame">Información del proyecto</a>
                            </li>
                            <li class="nav-item">
                                <img src="https://cdn-icons-png.flaticon.com/512/69/69943.png" alt="Casa" width="30" align="right">
                                <a style="margin-left: 10px; border: none" class="btn btn-outline-light" href="controlador/controlador.php?menu=Validacion" target="myFrame">Validación</a>
                            </li>
                        </ul>
                        <div class="dropdown">
                            <button style="border: none;" class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton1">
                                <?php echo $emp->getNom(); ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item" href="#"><?php echo $emp->getUser(); ?></a>
                                <a class="dropdown-item" href="#"><?php echo $emp->getCorreo(); ?></a>
                                <a class="dropdown-item" href="controlador/controlador.php?menu=Perfil&accion=Listar" target="myFrame">Perfil</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#notificationsModal">Notificaciones</a>
                                <div class="dropdown-divider"></div>
                                <form action="controlador/validar.php" method="POST">
                                    <button name="accion" value="Salir" class="dropdown-item">Salir</button>
                                </form>
                            </div>
                        </div>
                        <!-- Modal de Notificaciones -->
                        <div class="modal fade" id="notificationsModal" tabindex="-1" aria-labelledby="notificationsModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="notificationsModalLabel">Notificaciones</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Aquí se mostrarán las notificaciones -->
                                        <div class="list-group">
                                            <?php while ($row = $result->fetch_assoc()): ?>
                                                <a href="#" class="list-group-item list-group-item-action">
                                                    <h5 class="mb-1"><?= htmlspecialchars($row['titulo']) ?></h5>
                                                    <p class="mb-1"><?= htmlspecialchars($row['descripcion']) ?></p>
                                                    <small><?= htmlspecialchars($row['fecha']) ?></small>
                                                </a>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="m-4" style="height: 550px;">
                    <iframe name="myFrame" style="height: 150%; width: 100%; border: none"></iframe>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </body>

            </html>
        <?php
            $stmt->close();
            $conn->close();
        } else {
            header("Location: Controlador.php?menu=Principal");
            exit();
        }
        ?>