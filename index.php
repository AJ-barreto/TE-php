<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="css/estilosLogin.css" type="text/css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="cuerpoFormulario" id="cuerpoFormulario">
        <form class="formularioLogin" id="formularioLogin" method="POST" action="controlador/validar.php">
            <h1>Iniciar Sesión</h1>

            <p>Usuario:</p>
            <div class="texto">
                <input type="text" name="txtuser" class="txt form-control">
            </div>

            <p>Contraseña:</p>
            <div class="texto">
                <input type="password" name="txtpass" class="txt form-control">
            </div>

            <br>

            <input type="submit" name="accion" value="Ingresar" class="btn btn-primary btn-block">
            <input type="button" value="Borrar Datos" class="btn" onclick="resetearFormularioLogin()">
            <input type="submit" name="accion" value="Registrar Nuevo Usuario" class="btn">

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <input type="submit" class="btn" name="accion" value="Recuperar Contrasena"></button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/funcionesLogin.js"></script>
</body>
</html>
