<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="css/estilosLogin.css" type="text/css" media="all">
</head>
<body>
    <div class="cuerpoFormulario" id="cuerpoFormulario">
        <form class="formularioLogin" id="formularioLogin" method="POST" action="controlador/validar.php">
            <h1>Inicie Sesión</h1>

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
        </form>
    </div>
    <script src="js/funcionesLogin.js"></script>
</body>
</html>
