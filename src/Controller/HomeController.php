<?php

namespace App\Controller;

use App\Repository\PoemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(PoemeRepository $poemeRepository): Response
    {
        $allPoemes = $poemeRepository->findAll();

        $randomPoemesKeys = array_rand($allPoemes, 5);
        $randomPoemes = array_intersect_key($allPoemes, array_flip($randomPoemesKeys));

        return $this->render('home/index.html.twig', [
            'randomPoemes' => $randomPoemes,
            'controller_name' => 'HomeController',
        ]);
    }
}
