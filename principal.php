    <?php
    include_once 'Modelo/Empleado.php';
    session_start();
    $emp = $_SESSION['usuario'];
    

    if ($emp != null) {
        //handlePerfil('Listar', new EmpleadoDAO(), $emp);
    ?>
    <!DOCTYPE html>
    <html>
        <head>
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
                            <div class="dropdown-divider"></div>
                            <form action="controlador/validar.php" method="POST">
                                <button name="accion" value="Salir" class="dropdown-item">Salir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="m-4" style="height: 550px;">
                <iframe name="myFrame" style="height: 150%; width: 100%; border: none"></iframe>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        </body>
    </html>
    <?php
    } else {
        header("Location: Controlador.php?menu=Principal");
        exit();
    }
    ?>
