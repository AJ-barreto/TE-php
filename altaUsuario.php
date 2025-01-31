<?php
// No es necesario iniciar sesión aquí, ya que no estamos manejando sesión en este formulario
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de Usuario</title>
        <link rel="stylesheet" href="css/estilosAltaUsuario.css" type="text/css" media="all">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <!-- Modal de Términos y Condiciones -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Términos y Condiciones</h5>
                </div>
                <div class="modal-body">
                    <h2>Privacidad de los Datos</h2>
                    <p>Sus datos personales serán tratados de manera confidencial y utilizados únicamente para los fines especificados en nuestra política de privacidad.</p>
                    
                    <h2>Obligaciones del Usuario</h2>
                    <p>El usuario se compromete a utilizar la plataforma de manera responsable y a no infringir las leyes aplicables ni los derechos de terceros.</p>
                    
                    <h2>Limitaciones de Responsabilidad</h2>
                    <p>La plataforma no se hace responsable de los daños directos o indirectos que puedan surgir del uso o imposibilidad de uso de los servicios proporcionados.</p>
                    
                    <h2>Derechos de Uso de los Servicios</h2>
                    <p>El usuario tiene derecho a utilizar los servicios de la plataforma de acuerdo con los términos y condiciones establecidos. No se permite la reproducción, distribución o uso no autorizado de los contenidos de la plataforma.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="rejectTerms">No Acepto</button>
                    <button type="button" class="btn btn-primary" id="acceptTerms">Acepto</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Mostrar la ventana modal automáticamente al cargar la página
        window.addEventListener('load', function () {
            var termsModal = new bootstrap.Modal(document.getElementById('termsModal'));
            termsModal.show();

            document.getElementById('acceptTerms').addEventListener('click', function () {
                termsModal.hide();
            });

            document.getElementById('rejectTerms').addEventListener('click', function () {
                window.location.href = 'index.php';
            });
        });
    </script>
    </body>
    <script src="js/funcionesAltaUsuario.js"></script>
</html>
