<?php
require_once '../Modelo/EmpleadoDAO.php';
require_once '../Modelo/EnlaceDAO.php';
session_start();

$empleadoDAO = new EmpleadoDAO();
$enlaceDAO = new EnlaceDAO();

$menu = isset($_GET['menu']) ? $_GET['menu'] : '';
if($accion = isset($_GET['accion']) ? $_GET['accion'] : ''){
    $accion = isset($_GET['accion']) ? $_GET['accion'] : '';
} else {
    $accion = $_POST['accion'] ?? null;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') { echo "Formulario enviado\n"; var_dump($_POST); }
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

if ($usuario != null) {
    switch ($menu) {
        case 'Principal':
            include '../Principal.php';
            break;
        case 'Home':
            include '../index Home.php';
            break;
        case 'Registrar Nuevo Usuario':
            include '../altaUsuario.php';
            break;
        case 'InformacionProyecto':
            include '../informacionProyecto.php';
            break;
        case 'Validacion':
            include '../Validacion.php';
            break;
        case 'Perfil':
            //print_r("Accion $accion");
            handlePerfil($accion, $empleadoDAO, $usuario);
            break;
        case 'Empleado':
            handleEmpleado($accion, $empleadoDAO);
            break;
        case 'Enlace':
            handleEnlace($accion, $enlaceDAO);
            break;
        default:
            include '../index.php';
            break;
    }
} else {
    include '../index.php';
}

function handlePerfil($accion, $empleadoDAO, $usuario) {
    switch ($accion) {
        case 'Listar':
            $empleados = $empleadoDAO->listar($usuario->getUser());
            include '../Perfil.php';
            break;
        case 'Editar':
            $id = $_GET['id'];
            $empleado = $empleadoDAO->listarId($id);
            include '../Perfil.php';
            break;
        case 'Actualizar':
            print_r("ACCION $accion");
            $id = filter_input(INPUT_POST, 'txtId', FILTER_SANITIZE_NUMBER_INT);
            $nombre = filter_input(INPUT_POST, 'txtNombres');
            $telefono = filter_input(INPUT_POST, 'txtTel'); 
            $estado = filter_input(INPUT_POST, 'txtestado');
            $usuario = filter_input(INPUT_POST, 'txtUsuario'); 
            $correo = filter_input(INPUT_POST, 'txtCorreo');

            echo "ID: $id\n";
            echo "Nombre: $nombre\n";
            echo "Telefono: $telefono\n";
            echo "Estado: $estado\n";
            echo "Usuario: $usuario\n";
            echo "Correo: $correo\n";
            echo "LUEGO LUEGO LUEGO LUEGO LUEGO LUEGO";
            /*$id = $_POST['txtId'];
            $nombre = $_POST['txtNombres'];
            $telefono = $_POST['txtTel'];
            $estado = $_POST['txtestado'];
            $usuario = $_POST['txtUsuario'];
            $correo = $_POST['txtCorreo'];*/
            $empleado = new Empleado();
            $empleado->__constructWithParams($id, $nombre, $telefono, $estado, $usuario, $correo);
            $nombre = $empleado->getNom(); $tel = $empleado->getTel(); $est = $empleado->getEstado(); $user = $empleado->getUser(); $cor = $empleado->getCorreo(); $id = $empleado->getId();    
        print_r("Nombre: $nombre");
        print_r("Telefono: $tel");
        print_r("estado: $est");
        print_r("usuario: $user");
        print_r("correo: $cor");
        print_r("ID: $id");
            try{
                $result = $empleadoDAO->actualizar($empleado);
                if($result){
                    echo "VAMOOOOS";
                } else {
                    echo "NO";
                }
                header('Location: controlador.php?menu=Perfil&accion=Listar');
            } catch (Exception $e) { echo "Error al actualizar el empleado: " . $e->getMessage(); }
            break;
        case 'ActualizarContraseña':
            $id = $_POST['txtId'];
            $contraseña = $_POST['txtContra'];
            $contraseñaSegura = $empleadoDAO->asegurarClave($contraseña);
            $empleado = new Empleado();
            $empleado->__constructWithIdAndContra($id, $contraseñaSegura);
            $D = $empleado->getId();
            $CS = $empleado->getContra();
            print_r("ID $D");
            print_r("CONTRA $contraseña");
            print_r("CONTRA $CS");
            //$empleado->setId($id);
            //$empleado->setContra(asegurarClave($contraseña));
            $empleadoDAO->actualizarContra($empleado);
            header('Location: Controlador.php?menu=Perfil&accion=Listar');
            break;
        case 'Delete':
            $id = $_GET['id'];
            $empleadoDAO->delete($id);
            header('Location: Controlador.php?menu=Perfil&accion=Listar');
            break;
    }
}

function handleEmpleado($accion, $empleadoDAO) {
    switch ($accion) {
        case 'Listar':
            $empleados = $empleadoDAO->listar();
            include 'Empleado.php';
            break;
        case 'Agregar':
            $dni = $_POST['txtDni'];
            $contraseña = $_POST['txtContra'];
            $nombre = $_POST['txtNombres'];
            $telefono = $_POST['txtTel'];
            $estado = $_POST['txtestado'];
            $usuario = $_POST['txtUsuario'];
            $empleado = new Empleado($dni, $contraseña, $nombre, $telefono, $estado, $usuario);
            $empleadoDAO->agregar($empleado);
            header('Location: Controlador.php?menu=Empleado&accion=Listar');
            break;
        case 'Editar':
            $id = $_GET['id'];
            $empleado = $empleadoDAO->listarId($id);
            include 'Empleado.php';
            break;
        case 'Actualizar':
            $id = $_POST['txtId'];
            $dni = $_POST['txtDni'];
            $contraseña = $_POST['txtContra'];
            $nombre = $_POST['txtNombres'];
            $telefono = $_POST['txtTel'];
            $estado = $_POST['txtestado'];
            $usuario = $_POST['txtUsuario'];
            $empleado = new Empleado($dni, $contraseña, $nombre, $telefono, $estado, $usuario);
            $empleado->setId($id);
            $empleadoDAO->actualizar($empleado);
            header('Location: Controlador.php?menu=Empleado&accion=Listar');
            break;
        case 'Delete':
            $id = $_GET['id'];
            $empleadoDAO->delete($id);
            echo "<script>window.top.location.href = '../index.php';</script>"; exit();
            break;
    }
}

function handleEnlace($accion, $enlaceDAO) {
    switch ($accion) {
        case 'Listar':
            $enlaces = $enlaceDAO->listar();
            $_SESSION['enlaces'] = $enlaces;
            unset($_SESSION['enlace']);
            include '../Enlaces.php';
            break;
        case 'Agregar':
            $nombre = $_POST['txtNombre'];
            $tipo = $_POST['txtTipo'];
            $url = $_POST['txtUrl'];
            $enlace = new Enlace;
            $enlace->__constructWithParams($nombre, $tipo, $url);
            print_r("NOMBRE $nombre, TIPO $tipo, URL $url");
            print_r("ESTE YA ES OBJETO");
            print_r("NOMBRE : $nom, TIPO : $ti, URL : $u");
            $enlaceDAO->agregar($enlace);
            header('Location: Controlador.php?menu=Enlace&accion=Listar');
            break;
        case 'Actualizar':
            $id = $_POST['txtId'];
            $nombre = $_POST['txtNombre'];
            $tipo = $_POST['txtTipo'];
            $url = $_POST['txtUrl'];
            print_r("NOMBRE $nombre, TIPO $tipo, URL $url, ID $id");
            $enlace = new Enlace;
            $enlace->__constructWithParams($nombre, $tipo, $url);
            $enlace->setId($id);
            $enlaceDAO->actualizar($enlace);
            header('Location: Controlador.php?menu=Enlace&accion=Listar');
            break;
        case 'Editar':
            $id = $_GET['id'];
            $enlace = $enlaceDAO->listarId($id);
            $_SESSION['enlace'] = $enlace;
            include '../Enlaces.php';
            break;
        case 'Delete':
            $id = $_GET['id'];
            $enlaceDAO->delete($id);
            header('Location: Controlador.php?menu=Enlace&accion=Listar');
            break;
    }
}

/*function asegurarClave($textoClaro) {
    return hash('sha256', $textoClaro);
    //return password_hash($textoClaro, PASSWORD_BCRYPT);
}*/
?>
