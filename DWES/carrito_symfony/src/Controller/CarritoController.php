<?php

namespace App\Controller;

use App\Entity\Pedido;
use App\Entity\PedidosProductos;
use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CarritoController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/add-to-cart/{id}', name: 'add_to_cart', methods: ['POST'])]
    public function addToCart($id, Request $request, SessionInterface $session): Response
    {
        $producto = $this->entityManager->getRepository(Producto::class)->find($id);

        if (!$producto) {
            throw $this->createNotFoundException('Producto no encontrado.');
        }

        $cantidad = $request->request->get('cantidad', 1);
        $cantidad = max(1, (int)$cantidad);

        $carrito = $session->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += $cantidad;
        } else {
            $carrito[$id] = [
                'id' => $producto->getId(),
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio(),
                'cantidad' => $cantidad,
            ];
        }

        $session->set('carrito', $carrito);

        $this->addFlash('success', 'Producto añadido al carrito correctamente.');
        return $this->redirectToRoute('carrito');
    }

    #[Route('/carrito', name: 'carrito')]
    public function showCart(SessionInterface $session): Response
    {
        $carrito = $session->get('carrito', []);
        $total = array_reduce($carrito, function ($carry, $item) {
            return $carry + ($item['precio'] * $item['cantidad']);
        }, 0);

        return $this->render('carrito/index.html.twig', [
            'carrito' => $carrito,
            'total' => $total,
        ]);
    }

    #[Route('/actualizar-carrito/{id}', name: 'actualizar_carrito', methods: ['POST'])]
    public function actualizarCarrito($id, Request $request, SessionInterface $session): Response
    {
        $carrito = $session->get('carrito', []);
        $cantidad = $request->request->getInt('cantidad');

        if (isset($carrito[$id])) {
            if ($cantidad > 0) {
                $carrito[$id]['cantidad'] = $cantidad;
                $this->addFlash('success', 'Cantidad actualizada correctamente.');
            } else {
                unset($carrito[$id]);
                $this->addFlash('success', 'Producto eliminado del carrito.');
            }
            $session->set('carrito', $carrito);
        } else {
            $this->addFlash('error', 'Producto no encontrado en el carrito.');
        }

        return $this->redirectToRoute('carrito');
    }

    #[Route('/remove-from-cart/{id}', name: 'remove_from_cart')]
    public function removeFromCart($id, SessionInterface $session): Response
    {
        $carrito = $session->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            $session->set('carrito', $carrito);
            $this->addFlash('success', 'Producto eliminado del carrito.');
        } else {
            $this->addFlash('error', 'El producto no existe en el carrito.');
        }

        return $this->redirectToRoute('carrito');
    }

    #[Route('/realizar-pedido', name: 'realizar_pedido', methods: ['POST'])]
    public function realizarPedido(SessionInterface $session): Response
    {
        $carrito = $session->get('carrito', []);

        if (empty($carrito)) {
            $this->addFlash('error', 'No hay productos en el carrito');
            return $this->redirectToRoute('carrito');
        }

        $pedido = new Pedido();
        $pedido->setFecha(new \DateTime());
        $pedido->setEnviado(false);
        $pedido->setIdCliente(1); // ID de cliente por defecto, ajusta según tu lógica de autenticación

        $this->entityManager->persist($pedido);
        $this->entityManager->flush(); // Flush aquí para obtener el ID del pedido

        foreach ($carrito as $id => $item) {
            $producto = $this->entityManager->getRepository(Producto::class)->find($id);
            if (!$producto) {
                continue;
            }

            $pedidoProducto = new PedidosProductos();
            $pedidoProducto->setIdPedido($pedido->getId());
            $pedidoProducto->setIdProducto($producto->getId());
            $pedidoProducto->setCantidad($item['cantidad']);

            $this->entityManager->persist($pedidoProducto);
        }

        $this->entityManager->flush();

        $session->remove('carrito');

        $this->addFlash('success', 'Pedido realizado con éxito');
        return $this->redirectToRoute('ver_pedido', ['id' => $pedido->getId()]);
    }

    #[Route('/pedido/{id}', name: 'ver_pedido')]
    public function verPedido(int $id): Response
    {
        $pedido = $this->entityManager->getRepository(Pedido::class)->find($id);

        if (!$pedido) {
            throw $this->createNotFoundException('Pedido no encontrado');
        }

        $pedidosProductos = $this->entityManager->getRepository(PedidosProductos::class)->findBy(['idPedido' => $id]);

        $detallesPedido = [];
        $total = 0;
        foreach ($pedidosProductos as $pedidoProducto) {
            $producto = $this->entityManager->getRepository(Producto::class)->find($pedidoProducto->getIdProducto());
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
