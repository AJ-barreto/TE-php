<?php
require_once 'config/Conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['token']) && !empty($_POST['token'])) {
        $token = $_POST['token'];
        $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

        print_r("TOKEN: $token YYYYYY PASWORD $new_password");

        // Verifica el token y actualiza la contraseña
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ? AND expires_at > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($email);
            $stmt->fetch();
            
            // Actualizar la contraseña del usuario
            $stmt = $conn->prepare("UPDATE empleado SET contra = ? WHERE correo = ?");
            $stmt->bind_param("ss", $new_password, $email);
            $stmt->execute();

            // Eliminar el token
            $stmt = $conn->prepare("DELETE FROM password_resets WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            echo "Su contraseña ha sido actualizada con éxito.";
        } else {
            echo "El enlace de restablecimiento es inválido o ha expirado.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Token no proporcionado.";
    }
} else {
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    } else {
        echo "Token no proporcionado.";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Restablecer Contraseña</h1>
        <form action="controlador/validar.php" method="post">
            <input type="hidden" name="token" id="token" value="<?= htmlspecialchars($token) ?>">
            <div class="mb-3">
                <label for="emailConfirm" class="form-label">Digite su Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Nueva Contraseña</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <input type="submit" class="btn" name="accion" value="Guardar Contrasena"></button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
