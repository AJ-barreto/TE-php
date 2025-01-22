<?php
// EnlaceDAO.php
require_once '../config/Conexion.php';
require_once '../Modelo/enlace.php';

class EnlaceDAO {
    private $conexion;
    private $conn;
    private $ps;
    private $rs;
    private $r;

    public function __construct() {
        $this->conexion = new Conexion();
        $this->conn = $this->conexion->getConexion();
    }

    // Operaciones CRUD

    // Listar todos los enlaces
    public function listar() {
        $sql = "SELECT * FROM enlace";
        $lista = [];
        try {
            if ($stmt = $this->conn->prepare($sql)) { 
                $stmt->execute(); 
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    $en = new Enlace(); 
                    $en->setId($row['id']); 
                    $en->setNombre($row['nombre']); 
                    $en->setTipo($row['tipo']); 
                    $en->setUrl($row['url']); 
                    $lista[] = $en; 
                }
                $stmt->close();
            } else {
                throw new Exception("Error en la preparación de la declaración.");
            }
            /*$this->conn = $this->conexion->getConexion();
            $this->ps = $this->conn->prepare($sql);
            $this->ps->execute();
            $this->rs = $this->ps->fetchAll(PDO::FETCH_ASSOC);
            foreach ($this->rs as $row) {
                $en = new Enlace();
                $en->setId($row['id_enlace']);
                $en->setNombre($row['nombre']);
                $en->setTipo($row['tipo']);
                $en->setUrl($row['url']);
                $lista[] = $en;
            }*/
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return $lista;
    }

    // Agregar un enlace
    public function agregar($en) {
        $sql = "INSERT INTO enlace (nombre, tipo, url) VALUES (?, ?, ?)";
        try {
            if ($stmt = $this->conn->prepare($sql)) { 
                $nombre = $en->getNombre(); 
                $tipo = $en->getTipo(); 
                $url = $en->getUrl(); 
                $stmt->bind_param("sss", $nombre, $tipo, $url); 
                $stmt->execute(); 
                $rowCount = $stmt->affected_rows; 
                $stmt->close(); 
                return $rowCount;
            } else { 
                throw new Exception("Error en la preparación de la declaración."); 
            }
            /*$this->con = $this->conexion->getConexion();
            $this->ps = $this->con->prepare($sql);
            $this->ps->bindParam(1, $en->getNombre());
            $this->ps->bindParam(2, $en->getTipo());
            $this->ps->bindParam(3, $en->getUrl());
            $this->ps->execute();*/
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return 0;
    }

    // Listar un enlace por ID
    public function listarId($id) {
        $en = new Enlace();
        $sql = "SELECT * FROM enlace WHERE id_enlace = ?";
        try {
            if ($stmt = $this->conn->prepare($sql)) { 
                $stmt->bind_param("i", $id); 
                $stmt->execute(); 
                $result = $stmt->get_result();
                if ($row = $result->fetch_assoc()) { 
                    $en->setId($row['id_enlace']); 
                    $en->setNombre($row['nombre']); 
                    $en->setTipo($row['tipo']); 
                    $en->setUrl($row['url']); 
                }
                $stmt->close();
            } else {
                throw new Exception("Error en la preparación de la declaración.");
            }
            /*$this->con = $this->conexion->getConexion();
            $this->ps = $this->con->prepare($sql);
            $this->ps->bindParam(1, $id, PDO::PARAM_INT);
            $this->ps->execute();
            $this->rs = $this->ps->fetch(PDO::FETCH_ASSOC);
            if ($this->rs) {
                $en->setId($this->rs['id_enlace']);
                $en->setNombre($this->rs['nombre']);
                $en->setTipo($this->rs['tipo']);
                $en->setUrl($this->rs['url']);
            }*/
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return $en;
    }

    // Actualizar un enlace
    public function actualizar($en) {
        $sql = "UPDATE enlace SET nombre = ?, tipo = ?, url = ? WHERE id_enlace = ?";
        $result = false;
        try {
            if ($stmt = $this->conn->prepare($sql)) { 
                $nombre = $en->getNombre(); 
                $tipo = $en->getTipo(); 
                $url = $en->getUrl(); 
                $id = $en->getId(); 
                $stmt->bind_param("sssi", $nombre, $tipo, $url, $id); $result = $stmt->execute(); 
                $stmt->close(); 
            } else {
                throw new Exception("Error en la preparación de la declaración.");
            }
            /*$this->con = $this->conexion->getConexion();
            $this->ps = $this->con->prepare($sql);
            $this->ps->bindParam(1, $en->getNombre());
            $this->ps->bindParam(2, $en->getTipo());
            $this->ps->bindParam(3, $en->getUrl());
            $this->ps->bindParam(4, $en->getId(), PDO::PARAM_INT);
            $this->ps->execute();*/
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return $this->r;
    }

    // Eliminar un enlace
    public function delete($id) {
        $sql = "DELETE FROM enlace WHERE id_enlace = ?";
        $result = false;
        try {
            if ($stmt = $this->conn->prepare($sql)) { 
                $stmt->bind_param("i", $id); 
                $result = $stmt->execute(); 
                $stmt->close(); 
            } else {
                throw new Exception("Error en la preparación de la declaración.");
            }
            /*$this->con = $this->conexion->getConexion();
            $this->ps = $this->con->prepare($sql);
            $this->ps->bindParam(1, $id, PDO::PARAM_INT);
            $this->ps->execute();*/
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
    }
}
?>
