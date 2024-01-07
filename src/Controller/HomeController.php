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
    public function accueil(Request $request, PoemeRepository $poemeRepository): Response
    {
        return $this->render('home/index.html.twig', [
            //'poeme' => $poeme,
            'controller_name' => 'HomeController',
        ]);
    }
}
