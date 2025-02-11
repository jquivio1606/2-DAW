<?php

namespace App\Controller;

use App\Entity\Pedido;
use App\Entity\PedidosProductos;
use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PedidoController extends AbstractController
{
    #[Route('/pedido', name: 'pedido_list')]
    public function listPedidos(EntityManagerInterface $entityManager): Response
    {
        $pedidos = $entityManager->getRepository(Pedido::class)->findAll();
        
        return $this->render('pedido/list.html.twig', [
            'pedidos' => $pedidos,
        ]);
    }

    #[Route('/pedido/{id}', name: 'pedido_detalle')]
    public function detallePedido(int $id, EntityManagerInterface $entityManager): Response
    {
        $pedido = $entityManager->getRepository(Pedido::class)->find($id);
        
        if (!$pedido) {
            throw $this->createNotFoundException('Pedido no encontrado');
        }
        
        $pedidosProductos = $entityManager->getRepository(PedidosProductos::class)->findBy(['id_pedido' => $id]);

        $detallesPedido = [];
        $total = 0;
        foreach ($pedidosProductos as $pedidoProducto) {
            $producto = $entityManager->getRepository(Producto::class)->find($pedidoProducto->getIdProducto());
            $subtotal = $producto->getPrecio() * $pedidoProducto->getCantidad();
            $total += $subtotal;
            $detallesPedido[] = [
                'producto' => $producto,
                'cantidad' => $pedidoProducto->getCantidad(),
                'subtotal' => $subtotal
            ];
        }

        return $this->render('pedido/detalle.html.twig', [
            'pedido' => $pedido,
            'detallesPedido' => $detallesPedido,
            'total' => $total
        ]);
    }
}
