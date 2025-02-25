<?php

namespace Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="socios")
 */
class Socio {
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    private $id_socio;

    /** @ORM\Column(type="string") */
    private $nombre;
    
    /** @ORM\Column(type="string") */
    private $apellido1;
    
    /** @ORM\Column(type="string") */
    private $apellido2;
    
    /** @ORM\Column(type="string") */
    private $direccion;
    
    /** @ORM\Column(type="string") */
    private $telefono;
    
    /** @ORM\Column(type="string") */
    private $email;

    public function getIdSocio() {
        return $this->id_socio;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre= $nombre;
    }

    public function getApellido1() {
        return $this->apellido1;
    }

    public function setApellido1($apellido1) {
        $this->apellido1= $apellido1;
    }
    
    public function getApellido2() {
        return $this->apellido2;
    }
    
    public function setApellido2($apellido2) {
        $this->apellido2= $apellido2;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion= $direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono= $telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email= $email;
    }

}

