<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaillesController extends AbstractController
{
    #[Route('/tailles', name: 'app_tailles')]
    public function index(): Response
    {
        return $this->render('tailles/Tailles.html.twig', [
            'controller_name' => 'TaillesController',
        ]);
    }
}
