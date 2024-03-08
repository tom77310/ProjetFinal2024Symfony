<?php

namespace App\Controller;

use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WagonFretBacheController extends AbstractController
{
    // Page des 4 tailles produits
    #[Route('/wagonbache', name: 'app_WagonBache')]
    public function WagonBache(PagepresentationRepository $WagonBache): Response
    {
        return $this->render('WagonBache/WagonBache.html.twig', [
            'WagonBache' => $WagonBache->findBy(['id' => 7]),
        ]);
    }
    // ProduitHO
    #[Route('/wagonbacheHO', name: 'app_BacheHO')]
    public function BacheHO(ProduitsRepository $ProduitsHO): Response
    {
        return $this->render('WagonBache/BacheHO.html.twig', [
            'ProduitsHO' => $ProduitsHO->findBy(['id' => 9]),
        ]);
    }
    // ProduitZ
    #[Route('/wagonbacheZ', name: 'app_BacheZ')]
    public function BacheZ(ProduitsRepository $ProduitsZ): Response
    {
        return $this->render('WagonBache/BacheZ.html.twig', [
            'ProduitsZ' => $ProduitsZ->findBy(['id' => 10]),
        ]);
    }
    // ProduitN
    #[Route('/wagonbacheN', name: 'app_BacheN')]
    public function ProduitN(ProduitsRepository $ProduitsN): Response
    {
        return $this->render('WagonBache/BacheN.html.twig', [
            'ProduitsN' => $ProduitsN->findBy(['id' => 11]),
        ]);
    }
    // ProduitG
    #[Route('/wagonbacheG', name: 'app_BacheG')]
    public function ProduitG(ProduitsRepository $ProduitsG): Response
    {
        return $this->render('WagonBache/BacheG.html.twig', [
            'ProduitsG' => $ProduitsG->findBy(['id' => 12]),
        ]);
    }
}
