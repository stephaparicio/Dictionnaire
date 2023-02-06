<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PLanteController extends AbstractController
{
    #[Route('/plante', name: 'app_plante')]
    public function index(): Response
    {
        return $this->render('plante/index.html.twig', [
            'controller_name' => 'PLanteController',
        ]);
    }
}
