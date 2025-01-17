<?php

require_once 'Modelo/Empleado.php';

// Obtener la sesión del usuario
$emp = $_SESSION['usuario'] ?? null;

if ($emp != null) {
    $nombre = $emp->getNom(); $tel = $emp->getTel(); $est = $emp->getEstado(); $user = $emp->getUser(); $cor = $emp->getCorreo(); $id = $emp->getId();    
        print_r("Nombre: $nombre");
        print_r("Telefono: $tel");
        print_r("estado: $est");
        print_r("usuario: $user");
        print_r("correo: $cor");
        print_r("ID: $id");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ActualizarContrasena.css" type="text/css" media="all">
    <title>Perfil de Usuario</title>
</head>

<body style="background-color:powderblue;">
    <div style="text-align:center;">
        <img src="https://cdn-icons-png.flaticon.com/512/2830/2830573.png" alt="Empleados" width="100"/>
        <h1 style="color:blue; font-family:verdana;">PERFIL DEL USUARIO</h1>
    </div>
    
    <div class="d-flex" style="align-items: center; justify-content: center;">
        <div class="card" col-sm-6 style="border: 5px outset lightblue; background-color: lightblue; text-align: center; margin-left: 20px">
            <div class="card-body" style="border: 5px outset white;">
                <form action="controlador.php?menu=Perfil" method="POST">
                    <div class="form-group">
                        <input type="hidden" value="<?php echo $emp->getId(); ?>" name="txtId" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" value="<?php echo $emp->getNom(); ?>" name="txtNombres" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" value="<?php echo $emp->getTel(); ?>" name="txtTel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <input type="text" value="<?php echo $emp->getEstado(); ?>" name="txtestado" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" value="<?php echo $emp->getUser(); ?>" name="txtUsuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="text" value="<?php echo $emp->getCorreo(); ?>" name="txtCorreo" class="form-control">
                    </div>
                    <br>
                    <center>
                        <input type="submit" name="accion" value="Actualizar" class="btn btn-success">
                    </center>
                </form><br>

                <!-- Modal para cambio de contraseña -->
                <dialog id="modal">
                    <form action="Controlador.php?menu=Perfil" method="POST">
                        <h1>Cambio de Contraseña</h1>
                        <p>Contraseña Nueva</p>
                        <input type="password" name="txtContra" class="form-control"><br>
                        <input type="hidden" value="<?php echo $emp->getId(); ?>" name="txtId">
                        <div id="container">
                            <button type="submit" name="accion" value="ActualizarContraseña" class="btn btn-success" id="btn-actualizar">Actualizar</button>
                        </div><br>
                    </form>
                    <div id="container">
                        <button class="btn btn-danger" id="btn-cerrar">Cancelar</button>
                    </div>
                </dialog>
                <button class="btn btn-warning" id="btn-nueva-contraseña">Actualizar Contraseña</button>
            </div>
        </div>

        <div class="col-ms-8" style="border: 5px outset saddlebrown; background-color: white; margin: 20px">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CONTRASEÑA</th>
                        <th>NOMBRES</th>
                        <th>TELEFONO</th>
                        <th>ESTADO</th>
                        <th>USUARIO</th>
                        <th>CORREO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Suponiendo que tienes una lista de empleados
                    foreach ($empleados as $em) {
                    ?>
                        <tr>
                            <td><?php echo $em->getId(); ?></td>
                            <td>******</td>
                            <td><?php echo $em->getNom(); ?></td>
                            <td><?php echo $em->getTel(); ?></td>
                            <td><?php echo $em->getEstado(); ?></td>
                            <td><?php echo $em->getUser(); ?></td>
                            <td><?php echo $em->getCorreo(); ?></td>
                            <td>
                                
                                <a class="btn btn-danger" href="Controlador.php?menu=Empleado&accion=Delete&id=<?php echo $em->getId(); ?>">Eliminar Perfil</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="../js/ActualizarContrasena.js"></script>
</body>

</html>
<?php
} else {
    header("Location: Controlador.php?menu=Principal");
    exit;
}
?>
