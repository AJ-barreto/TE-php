<?php
// No es necesario iniciar sesión aquí, ya que no estamos manejando sesión en este formulario
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Registro de Usuario</title>
        <link rel="stylesheet" href="css/estilosAltaUsuario.css" type="text/css" media="all">
    </head>
    <body>
        <div class="cuerpoFormulario" id="cuerpoFormulario"> 
            <form class="formularioAlta" id="formularioAlta" method="POST" action="controlador/validar.php">
                <h1>Registro de Usuarios</h1>
                <br>
                <label>Nombre:</label> 
                <input type="text" class="txt" id="Nombres" name="txtNombres">
                <label>Correo:</label> 
                <input type="text" id="email" class="txt" name="txtCorreo" class="form-control">
                <br>
                <br>
                <label>Nombre de Usuario:</label> 
                <input type="text" class="txt" id="NombreUser" name="txtUsuario">
                <br>
                <br>
                <label>Contraseña:</label> 
                <input type="password" class="txt" id="txtContrasena" name="txtContra">
                <label>Repetir la Contraseña:</label> 
                <input type="password" class="txt" id="txtRepetirContrasena" name="txtRepetirContra">
                <br>
                <br>
                <label class="avisoContrasena" id="avisoContrasena"> ------- </label>
                <br>
                <br>
                <br>
                <br>
                <input type="submit" name="accion" value="Inicio" class="btn btn-primary btn-block">
                <input type="submit" name="accion" value="Registrar" class="btn">
                <input type="button" value="Borrar Datos" class="btn" id="btnBorrar" onclick="resetearFormulario()">
            </form>
        </div>
    </body>
    <script src="js/funcionesAltaUsuario.js"></script>
</html>
