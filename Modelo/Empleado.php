<?php
// Empleado.php

class Empleado {
    private $id;
    private $dni;
    private $contra;
    private $nom;
    private $tel;
    private $estado;
    private $user;
    private $correo;

    // Constructor por defecto
    public function __construct() {
    }

    // Constructor con parámetros
    public function __constructWithParams($id, $nom, $tel, $estado, $user, $correo) {
        
        $this->id = $id;
        //$instance->dni = $dni;
        //$this->contra = $contra;
        $this->nom = $nom;
        $this->tel = $tel;
        $this->estado = $estado;
        $this->user = $user;
        $this->correo = $correo;
        //return $instance;
    }

    // Constructor para el registro
    public function __constructForRegistration($contra, $nom, $user, $correo) {
        //$instance = new self();
        $this->correo = $correo;
        $this->contra = $contra;
        $this->nom = $nom;
        $this->user = $user;
        //return $instance;
    }

    // Constructor con id y contraseña
    public function __constructWithIdAndContra($id, $contra) {
        //$instance = new self();
        $this->id = $id;
        $this->contra = $contra;
        //return $instance;
    }

    // Métodos getter y setter

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getContra() {
        return $this->contra;
    }

    public function setContra($contra) {
        $this->contra = $contra;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }
}
?>
