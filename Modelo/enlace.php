<?php
// Enlace.php

class Enlace {
    private $id;
    private $nombre;
    private $tipo;
    private $url;
    
    // Constructor vacío
    public function __construct() {
    }

    // Constructor con parámetros
    public function __constructWithParams($id, $nombre, $tipo, $url) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->url = $url;
    }

    // Getter y Setter para id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter y Setter para nombre
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Getter y Setter para tipo
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    // Getter y Setter para url
    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }
}
?>
