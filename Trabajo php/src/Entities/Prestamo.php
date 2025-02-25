<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="prestamos")
 */
class Prestamo
{
   /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
   private $id_prestamo;
   /** @ORM\ManyToOne(targetEntity="Libro") @ORM\JoinColumn(name="ISBN", referencedColumnName="ISBN") */
   private $libro;
   /** @ORM\ManyToOne(targetEntity="Socio") @ORM\JoinColumn(name="id_socio", referencedColumnName="id_socio") */
   private $socio;
   /** @ORM\Column(type="date") */
   private $fecha_prestamo;
   /** @ORM\Column(type="date", nullable=true) */
   private $fecha_devolucion;

    public function getIdPrestamo()
    {
        return $this->id_prestamo;
    }
}
