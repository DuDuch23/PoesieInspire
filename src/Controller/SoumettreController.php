<?php

namespace App\Controller;

use App\Entity\Poeme;
use App\Form\PoemeType;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SoumettreController extends AbstractController
{
    #[Route('/soumettre', name: 'soumettre')]
    public function soumettre(Request $request, EntityManagerInterface $entityManager): Response
    {
        $poeme = new Poeme();

        $form = $this->createForm(PoemeType::class, $poeme);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            try
            {
                $entityManager->persist($poeme);
                $entityManager->flush();

                $this->addFlash('Erreur', 'Poeme ajouté avec succès.');

                return $this->redirectToRoute('inspiration');
            }
            catch(Exception $exception)
            {
                return $this->redirectToRoute('soumettre', [
                    'erreur' => 'Erreur lors de l\'ajout du poème.',
                ]);
            }
        }

        return $this->render('soumettre/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
