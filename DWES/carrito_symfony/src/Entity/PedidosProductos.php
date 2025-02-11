<?php

namespace App\Entity;

use App\Repository\PedidosProductosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedidosProductosRepository::class)]
#[ORM\Table(name: "pedidosproductos")]
class PedidosProductos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: "id_pedido")]
    private ?int $idPedido = null;

    #[ORM\Column(name: "id_producto")]
    private ?int $idProducto = null;

    #[ORM\Column]
    private ?int $cantidad = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPedido(): ?int
    {
        return $this->idPedido;
    }

    public function setIdPedido(int $idPedido): self
    {
        $this->idPedido = $idPedido;
        return $this;
    }

    public function getIdProducto(): ?int
    {
        return $this->idProducto;
    }

    public function setIdProducto(int $idProducto): self
    {
        $this->idProducto = $idProducto;
        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;
        return $this;
    }
}
