<?php
// Incluye la clase Conexion
include_once '../config/Conexion.php';
include_once '../Modelo/Empleado.php';

class EmpleadoDAO {
    private $conexion;
    private $conn;

    public function __construct() {
        $this->conexion = new Conexion();
        $this->conn = $this->conexion->getConexion();
    }

    function verificarClave($textoClaro) {
        return base64_encode(hash('sha256', $textoClaro, true));
        //return password_hash($textoClaro, PASSWORD_BCRYPT);
    }

    function asegurarClave($textoClaro) {
        return hash('sha256', $textoClaro);
        //return password_hash($textoClaro, PASSWORD_BCRYPT);
    }

    /*function verificarClave($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }*/

    // Validar empleado
    public function validar($item, $pass) {
        print("ENTRA EN VALIDAR DEL EMPELADO DAO");
        var_dump($item);
        $user = $item->getUser(); $contra = $item->getContra();
        $empleado = new Empleado();
        $sql = "SELECT * FROM empleado WHERE Usuario = ? AND Contra = ?";
        try {
            if ($stmt = $this->conn->prepare($sql)) {
                $stmt->bind_param("ss", $user, $contra);
                $stmt->execute();
                //$stmt->bind_result($hashedPassword);
                $result = $stmt->get_result();
                //$stmt->fetch(); $stmt->close();

            /*$stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $item->getUser());
            $stmt->bindParam(2, $item->getContra());
            $stmt->execute();*/

            //if ($stmt->rowCount() > 0) {
                if ($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    $empleado->setId($row['idEmpleado']);
                    $empleado->setContra($row['contra']);
                    $empleado->setUser($row['Usuario']);
                    $empleado->setCorreo($row['Correo']);
                    $empleado->setNom($row['Nombres']);
                }
            $stmt->close();
            } else { throw new Exception("Error en la preparación de la declaración VALIDACIÖN."); }
        } catch (Exception $e) {
            echo "ERROR EN VALIDAR: " . $e->getMessage();
        }
        return $empleado;
    }

    // Listar empleados por usuario
    public function listar($usuario) {
        $sql = "SELECT idempleado, contra, nombres, telefono, estado, usuario, correo FROM empleado WHERE usuario = ?";
        $lista = [];
        try {
            if($stmt = $this->conn->prepare($sql)){
                $stmt->bind_param("s", $usuario);
                $stmt->execute(); 
                $result = $stmt->get_result();
            }
            
            //$stmt->bindParam(1, $usuario);
            //$stmt->execute();

            while ($row = $result->fetch_assoc()) {
                $empleado = new Empleado();
                $empleado->setId($row['idempleado']);
                $empleado->setContra($row['contra']);
                $empleado->setNom($row['nombres']);
                $empleado->setTel($row['telefono']);
                $empleado->setEstado($row['estado']);
                $empleado->setUser($row['usuario']);
                $empleado->setCorreo($row['correo']);
                $lista[] = $empleado;
            }
            
        } catch (Exception $e) {
            echo "ERROR EN LISTAR: " . $e->getMessage();
        }
        return $lista;
    }

    // Agregar un nuevo empleado
    public function agregar($empleado) {
        $sql = "INSERT INTO empleado (Nombres, Usuario, Correo, contra) VALUES (?, ?, ?, ?)";
        try {
            if($stmt = $this->conn->prepare($sql)){
                $stmt->bind_param("ssss", $empleado->getNom(), $empleado->getUser(), $empleado->getCorreo(), $empleado->getContra());
                $stmt->execute(); 
                $rowCount = $stmt->affected_rows; 
                $stmt->close(); 
                return $rowCount;
            } else {
                throw new Exception("Error en la preparación de la declaración.");
            }
            
            /*$stmt->bindParam(1, $empleado->getNom());
            $stmt->bindParam(2, $empleado->getUser());
            $stmt->bindParam(3, $empleado->getCorreo());
            $stmt->bindParam(4, $empleado->getContra());
            $stmt->execute();*/
        } catch (Exception $e) {
            echo "ERROR EN AGREGAR: " . $e->getMessage();
        }
        return 0;//$stmt->rowCount();
    }

    // Listar empleado por ID
    public function listarId($id) {
        $empleado = new Empleado();
        $sql = "SELECT * FROM empleado WHERE idEmpleado = ?";
        try {
            if($stmt = $this->conn->prepare($sql)){
                $stmt->bind_param("i", $id); 
                $stmt->execute(); 
                $result = $stmt->get_result();
            }
            
            /*$stmt->bindParam(1, $id);
            $stmt->execute();*/
            if ($row = $result->fetch_assoc()) {
                $empleado->setId($row['idEmpleado']);
                $empleado->setContra($row['contra']);
                $empleado->setNom($row['Nombres']);
                $empleado->setTel($row['Telefono']);
                $empleado->setEstado($row['Estado']);
                $empleado->setUser($row['Usuario']);
                $empleado->setCorreo($row['Correo']);
            }
            $stmt->close();
        } catch (Exception $e) {
            echo "ERROR EN LISTAR ID: " . $e->getMessage();
        }
        return $empleado;
    }

    // Actualizar empleado
    public function actualizar($empleado) {
        print("ENTRA EN ACTUALIZAR DEL EMPELADO DAO");
        $nombre = $empleado->getNom(); $tel = $empleado->getTel(); $est = $empleado->getEstado(); $user = $empleado->getUser(); $cor = $empleado->getCorreo(); $id = $empleado->getId();    
        print_r("Nombre: $nombre");
        print_r("Telefono: $tel");
        print_r("estado: $est");
        print_r("usuario: $user");
        print_r("correo: $cor");
        print_r("ID: $id");
        $sql = "UPDATE empleado SET Nombres = ?, Telefono = ?, Estado = ?, Usuario = ?, Correo = ? WHERE idEmpleado = ?";
        try {
            if($stmt = $this->conn->prepare($sql)){
                $stmt->bind_param("sssssi", $nombre, $tel, $est, $user, $cor, $id);
                //$stmt->bind_param("sssssi", $empleado->getNom(), $empleado->getTel(), $empleado->getEstado(), $empleado->getUser(), $empleado->getCorreo(), $empleado->getId());
                $stmt->execute(); 
                $rowCount = $stmt->affected_rows; 
                $stmt->close(); 
                return $rowCount;
            } else {
                throw new Exception("Error en la preparación de la declaración.");
            }
            
            /*$stmt->bindParam(1, $empleado->getNom());
            $stmt->bindParam(2, $empleado->getTel());
            $stmt->bindParam(3, $empleado->getEstado());
            $stmt->bindParam(4, $empleado->getUser());
            $stmt->bindParam(5, $empleado->getCorreo());
            $stmt->bindParam(6, $empleado->getId());
            $stmt->execute();*/
        } catch (Exception $e) {
            echo "ERROR EN ACTUALIZAR: " . $e->getMessage();
        }
        return 0;//$stmt->rowCount();
    }

    // Actualizar contraseña
    public function actualizarContra($empleado) {
        $id = $empleado->getId();
        $contra = $empleado->getContra();
        print_r("EN DAO ESTE ES CONTRA $contra");
        $sql = "UPDATE empleado SET contra = ? WHERE idEmpleado = ?";
        try {
            if($stmt = $this->conn->prepare($sql)){
                $stmt->bind_param("si", $contra, $id);
                //$stmt->bind_param("si", $empleado->getContra(), $empleado->getId());
                $stmt->execute();
                $rowCount = $stmt->affected_rows; 
                $stmt->close(); 
                return $rowCount;
            } else {
                throw new Exception("Error en la preparación de la declaración.");
            }
            
            /*$stmt->bindParam(1, $empleado->getContra());
            $stmt->bindParam(2, $empleado->getId());
            $stmt->execute();*/
        } catch (Exception $e) {
            echo "ERROR EN ACTUALIZAR CONTRA: " . $e->getMessage();
        }
        return 0;//$stmt->rowCount();
    }

    // Eliminar empleado
    public function delete($id) {
        $sql = "DELETE FROM empleado WHERE idEmpleado = ?";
        try {
            if($stmt = $this->conn->prepare($sql)){
                $stmt->bind_param("i", $id); 
                $stmt->execute(); 
                $rowCount = $stmt->affected_rows; 
                $stmt->close(); 
                echo "<script>window.top.location.href = '../index.php';</script>"; exit();
                return $rowCount;
            } else {
                throw new Exception("Error en la preparación de la declaración.");
            }
            
            /*$stmt->bindParam(1, $id);
            $stmt->execute();*/
        } catch (Exception $e) {
            echo "ERROR EN ELIMINAR: " . $e->getMessage();
        }
    }
}
?>
