<?php
// Conexion.php
class Conexion {
    private $server = "localhost"; 
    private $user = "root"; 
    private $pass = ""; 
    private $bd = "te"; 
    private $conexion;

    public function __construct(){
        $this->conexion = null;
    }

    public function getConexion(){
        $this->conexion = new mysqli($this->server, $this->user, $this->pass, $this->bd);

        if($this->conexion->connect_errno){
            die("Conexión Fallida en XAMPP". $this->conexion->connect_errno);
        } else {
            //echo "Conectado a la BD";
        }

        return $this->conexion;
    }
    

    

    /*private $host = 'localhost';
    private $usuario = 'postgres';
    private $contrasena = '123456';
    private $bd = 'ava2';
    private $puerto = '5432';
    private $conexion;

    public function __construct() {
        $this->conexion = null;
    }

    public function getConexion() {
        try {
            $cadena = "pgsql:host={$this->host};port={$this->puerto};dbname={$this->bd}";
            $this->conexion = new PDO($cadena, $this->usuario, $this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "ERROR EN CONEXIÓN: " . $e->getMessage();
        }
        return $this->conexion;
    }*/
}
?>
