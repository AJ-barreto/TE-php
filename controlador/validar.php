<?php
session_start();

require_once("../Modelo/EmpleadoDAO.php");
require_once("../Modelo/Empleado.php");

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

            if (strtolower($accion) == 'inicio') {
                header("Location: ../index.php");
                exit;
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
