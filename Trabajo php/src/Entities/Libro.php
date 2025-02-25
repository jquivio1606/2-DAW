<?php

namespace Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="libros")
 */
class Libro {
    /** @ORM\Id @ORM\Column(type="string") */
    private $ISBN;
    
    /** @ORM\Column(type="string") */
    private $titulo;
    
    /** @ORM\Column(type="string") */
    private $autor;

    /** @ORM\Column(type="date") */
    private $fecha_publicacion;
    

    public function getISBN() {
        return $this->ISBN;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo= $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor= $autor;
    }
    
    public function getFechaPublicacion() {
        return $this->fecha_publicacion;
    }
    
    public function setFechaPublicacion($fecha_publicacion) {
        $this->fecha_publicacion= $fecha_publicacion;
    }
}