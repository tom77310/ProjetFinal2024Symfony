<?php

namespace App\Controller;

use App\Entity\Pagepresentation;
use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NouveautésController extends AbstractController
{
    // Page avec les tailles 
    #[Route('/nouveautes', name: 'app_nouveautes')]
    public function Nouveautés(PagepresentationRepository $Nouveaute): Response
    {
        return $this->render('nouveautés/Nouveautes.html.twig', [
            'Nouveaute' => $Nouveaute->findBy(['id' => 11]),
        ]);
    }
    // ProduitHO
    #[Route('/nouveautesHO', name: 'app_nouveautesHO')]
    public function NouveautésHO(ProduitsRepository $ProduitsHO): Response
    {
        return $this->render('nouveautés/NouveautesHO.html.twig', [
            'ProduitsHO' => $ProduitsHO->findBy(['id' => 39]),
        ]);
    }
    // ProduitN
    #[Route('/nouveautesN', name: 'app_nouveautesN')]
    public function NouveautésN(ProduitsRepository $ProduitsN): Response
    {
        return $this->render('nouveautés/NouveautesN.html.twig', [
            'ProduitsN' => $ProduitsN->findBy(['id' => 38]),
        ]);
    }
}
