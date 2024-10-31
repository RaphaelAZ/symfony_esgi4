<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home/{limit}', name: 'app_home')]
    public function index(ProductRepository $productRepository, int $limit): Response
    {
        $products = $productRepository->findAllWithLimit($limit);

        return $this->render('home/index.html.twig', [
            'products' => $products,
        ]);
    }
}
