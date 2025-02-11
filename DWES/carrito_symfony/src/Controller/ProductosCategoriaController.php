<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\Producto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

final class ProductosCategoriaController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
    }
    #[Route('/productos/{id}', name: 'productos_categoria')]
    public function productosPorCategoria(int $id): Response
    {
        // Usar el EntityManager para encontrar la categoría
        $categoria = $this->em->getRepository(Categoria::class)->find($id);

        if (!$categoria) {
            throw $this->createNotFoundException('Categoría no encontrada.');
        }

        // Usar el EntityManager para buscar productos relacionados con la categoría
        $productos = $this->em->getRepository(Producto::class)->findBy(['categoria' => $categoria]);

        return $this->render('productos.html.twig', [
            'categoria' => $categoria,
            'productos' => $productos,
        ]);
    }
}
