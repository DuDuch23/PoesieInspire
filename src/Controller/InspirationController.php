<?php

namespace App\Controller;

use App\Repository\PoemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InspirationController extends AbstractController
{
    #[Route('/inspiration', name: 'inspiration')]
    public function inspiration(Request $request, PoemeRepository $poemeRepository): Response
    {
        $countPoemes = $poemeRepository->count([]);
        $countPerPage = 5;

        $currentPage = $request->query->getInt('page', 1);
        $countPages = ceil($countPoemes / $countPerPage);

        if($currentPage > $countPages || $currentPage <= 0)
        {
            throw $this->createNotFoundException();
        }

        $poemes = $poemeRepository->paginate('p', $currentPage, $countPerPage);

        return $this->render('inspiration/index.html.twig', [
            'poemes' => $poemes,
            'countPages' => $countPages,
            'currentPage' => $currentPage,
        ]);
    }
}
