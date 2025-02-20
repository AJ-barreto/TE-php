<?php
session_start();

require_once("../Modelo/EmpleadoDAO.php");
require_once("../Modelo/Empleado.php");
require_once("../config/Conexion.php");
require ("../vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

#require_once 'Modelo/empleadoDAO.php';
#require_once 'Modelo/empleado.php';

class Validar {

    private $edao;
    private $em;

    public function __construct() {
        //$edao = new EmpleadoDAO();
        $this->edao = new EmpleadoDAO();
        $this->em = new Empleado();
    }

    public function processRequest() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $accion = $_POST['accion'];
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
            $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;
            //$usuario = $_POST['usuario'];
            //$comentario = $_POST['comentario'];

            if (strtolower($accion) == 'inicio') {
                header("Location: ../index.php");
                exit;
            }

            if (strtolower($accion) == 'registrar') {
                $contra = $_POST['txtContra'];
                $nom = $_POST['txtNombres'];
                $user = $_POST['txtUsuario'];
                $gmail = $_POST['txtCorreo'];
                $contraSegura = $this->edao->asegurarClave($contra);
                $this->em->setContra($contraSegura);
                $this->em->setNom($nom);
                $this->em->setUser($user);
                $this->em->setCorreo($gmail);
                $this->em->setTel("N/A");
                $this->em->setEstado("N/A");

                try {
                    $this->edao->agregar($this->em);
                } catch (Exception $ex) {
                    echo "Problema Registrar: " . $ex->getMessage();
                }

                header("Location: ../index.php");
                exit;
            }

            if (strtolower($accion) == 'agregar comentario') {
                $conexion = new Conexion();
                $conn = $conexion->getConexion();

                $stmt = $conn->prepare("INSERT INTO comentarios (usuario, comentario) VALUES (?, ?)");
                $stmt->bind_param("ss", $usuario, $comentario);

                if ($stmt->execute()) {
                    $stmt->close();
                    $conn->close();
                } else {
                    $stmt->close();
                    $conn->close();
                }
                exit();
            }

            if (strtolower($accion) == 'salir') {
                session_unset();
                session_destroy();
                header("Location: ../index.php");
                exit;
            }

            if (strtolower($accion) == 'registrar nuevo usuario') {
                header("Location: ../altaUsuario.php");
                exit;
            }

            if (strtolower($accion) == 'recuperar contrasena') {
                // Verifica si el correo electrónico existe en la base de datos
                $conexion = new Conexion();
                $conn = $conexion->getConexion();
                $stmt = $conn->prepare("SELECT idEmpleado, usuario FROM empleado WHERE correo = ?");

                // Verifica si la preparación de la declaración tuvo éxito
                if (!$stmt) {
                    die("Error en la preparación de la declaración: " . $conn->error);
                    
                }
                

                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($user_id, $username);
                    $stmt->fetch();

                    // Generar un token único
                    $token = bin2hex(random_bytes(50));

                    // Guardar el token en la base de datos con una expiración
                    $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
                    $stmt->bind_param("ss", $email, $token);
                    $stmt->execute();

                    // Enviar el correo electrónico
                    $reset_link = "http://localhost:3000/restablecerContrasena.php?token=$token";
                    $mail = new PHPMailer(true);

                    try {
                        // Configuración del servidor
                        $mail->isSMTP();
                        $mail->Host = 'smtp.mailersend.net';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'MS_k6LVZO@trial-jpzkmgqw0n1g059v.mlsender.net';
                        $mail->Password = 'mssp.21GnPlg.k68zxl20k85gj905.TEnAC7h';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = 587;

                        // Configuración del correo
                        $mail->setFrom('no-reply@trial-jpzkmgqw0n1g059v.mlsender.net', 'Tu Sitio');
                        $mail->addAddress($email);
                        $mail->Subject = 'Recuperación de Contraseña';
                        $mail->Body = "Hola $username,\n\nHaga clic en el siguiente enlace para restablecer su contraseña:\n$reset_link";

                        // Enviar el correo
                        $mail->send();
                        echo "Se ha enviado un enlace de recuperación a su correo electrónico.";
                    } catch (Exception $e) {
                        echo "Hubo un error al enviar el correo electrónico: {$mail->ErrorInfo}";
                    }
                } else {
                    echo "No se encontró una cuenta con ese correo electrónico.";
                }

                $stmt->close();
                $conn->close();
                exit;
            }

            if (strtolower($accion) == 'guardar contrasena') {
                if (isset($_POST['token']) && !empty($_POST['token'])) {
                    $token = $_POST['token'];
                    $new_password = ($_POST['new_password']);

                    if (empty($new_password)) {
                        echo "Nueva contraseña no proporcionada.";
                        exit();
                    }


                    $pass = $this->edao->asegurarClave($new_password);

                    print_r("TOKEN: $token YYYYYY PASWORD $new_password YYYYYY PASS $pass YYYYYY Email $email");
            
                    try {
                        $conexion = new Conexion();
                        $conn = $conexion->getConexion();
                        
                        // Depuración: imprimir el token y verificar consulta
                        echo "Token recibido: $token<br>";
                
                        $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ?");
                        $stmt->bind_param("s", $token);
                        $stmt->execute();
                        $stmt->store_result();
                
                        // Depuración: imprimir número de filas encontradas
                        echo "Número de filas encontradas: " . $stmt->num_rows . "<br>";
                
                        if ($stmt->num_rows > 0) {
                            $stmt->bind_result($email);
                            $stmt->fetch();
                            
                            // Depuración: imprimir el email encontrado
                            echo "Email encontrado: $email<br>";
                            
                            // Actualizar la contraseña del usuario
                            $stmt = $conn->prepare("UPDATE empleado SET contra = ? WHERE correo = ?");
                            $stmt->bind_param("ss", $pass, $email);
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
                    } catch (Exception $e) {
                        echo "Error al actualizar la contraseña: " . $e->getMessage();
                    }

                    
                }
                header("Location: ../index.php");
                exit;
            }

            if (strtolower($accion) == 'ingresar') {
                print("ENTRA A INGRESAR EN VALIDAR");
                $user = $_POST['txtuser'];
                $contraseña = $_POST['txtpass'];
                print_r("ESTE ES CONTRASEÑA O PASS ANTES DE ASEGURAR $contraseña");
                $pass = $this->edao->asegurarClave($contraseña);
                print_r("           ESTE ES CONTRASEÑA O PASS LUEGO DE ASEGURAR $pass                       ");
                //$pass = $this->asegurarClave($_POST['txtpass']);
                $this->em->setUser($user);
                $this->em->setContra($pass);
                print("TENEMOS OBJETO");
                var_dump($this->em);
                try {
                    $this->em = $this->edao->validar($this->em, $contraseña);
                    if ($this->em->getUser() != null) {
                        $_SESSION['usuario'] = $this->em;
                        header("Location: ../Principal.php");
                        exit;
                    } else {
                        header("Location: ../index.php");
                        exit;
                    }
                } catch (Exception $ex) {
                    echo "Problema validar: " . $ex->getMessage();
                }
            } else {
                header("Location: ../Principal.php");
                exit;
            }
        }
    }

    /*private function asegurarClave($textoClaro) {
        return base64_encode(hash('sha256', $textoClaro, true));
        //return password_hash($textoClaro, PASSWORD_BCRYPT);
    }*/    
}

// Crear una instancia de la clase y procesar la solicitud
$validar = new Validar();
$validar->processRequest();
?>
