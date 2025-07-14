<?php
require_once __DIR__.'/../config/DB.php';


class Cliente {
    private $idcliente;
    private $nombre;
    private $correo;
    private $telefono;

    public function getIdcliente() {return $this->idcliente;}
    public function getNombre() {return $this->nombre;}

    public function getCorreo() {return $this->correo;}
    public function getTelefono() {return $this->telefono;}

    public function setIdcliente($idcliente) {$this->idcliente = $idcliente;}
    public function setNombre($nombre) {$this->nombre = $nombre;}

    public function setCorreo($correo) {$this->correo = $correo;}

    public function setTelefono($telefono) {$this->telefono = $telefono;}
}
