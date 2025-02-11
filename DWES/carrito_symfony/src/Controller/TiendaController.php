<?php

namespace App\Controller;

use App\Entity\Categoria;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TiendaController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
    }

    #[Route('/', name: 'app_carrito', methods: ['GET', 'HEAD'])]
    public function index(): Response
    {
        $categorias = $this->em->getRepository(Categoria::class)->findAll();

        return $this->render('home/index.html.twig', [
            'categorias' => $categorias,
        ]);
    }
}
