<?php

namespace App\Controller;

use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TGVController extends AbstractController
{
    #[Route('/TGV', name: 'app_TGV')]
    public function TGV(PagepresentationRepository $TGV): Response
    {
        return $this->render('TGV/TGV.html.twig', [
            'TGV' => $TGV->findBy(['id' => 3]),
        ]);
    }
    // Page Produit HO
    #[Route('/TGVHO', name: 'app_TGVHO')]
    public function TGVHO(ProduitsRepository $ProduitsHO): Response
    {
        return $this->render('TGV/TGVHO.html.twig', [
            'ProduitsHO' => $ProduitsHO->findBy(['id' => 29]),
        ]);
    }
    // Page produitN
    #[Route('/TGVN', name: 'app_TGVN')]
    public function TGVN(ProduitsRepository $ProduitsN): Response
    {
        return $this->render('TGV/TGVN.html.twig', [
            'ProduitsN' => $ProduitsN->findBy(['id' => 30]),
        ]);
    }
}
