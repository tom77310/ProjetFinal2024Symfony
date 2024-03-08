<?php

namespace App\Controller;

use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureVoyageursController extends AbstractController
{
    // Page avec les 4 tailles
    #[Route('/VV', name: 'app_VV')]
    public function VoitureVoyageurs(PagepresentationRepository $VoituresVoyageurs): Response
    {
        return $this->render('voiturevoyageurs/VV.html.twig', [
            'VoituresVoyageurs' => $VoituresVoyageurs->findBy(['id' => 4]),
        ]);
    }
    // Page produit HO
    #[Route('/VVHO', name: 'app_VVHO')]
    public function VoitureVoyageursHO(ProduitsRepository $ProduitsHO): Response
    {
        return $this->render('voiturevoyageurs/VVHO.html.twig', [
            'ProduitsHO' => $ProduitsHO->findBy(['id' => 25]),
        ]);
    }
    // Page produit N
    #[Route('/VVN', name: 'app_VVN')]
    public function VoitureVoyageursN(ProduitsRepository $ProduitsN): Response
    {
        return $this->render('voiturevoyageurs/VVN.html.twig', [
            'ProduitsN' => $ProduitsN->findBy(['id' => 27]),
        ]);
    }
    // Page produit Z
    #[Route('/VVZ', name: 'app_VVZ')]
    public function VoitureVoyageursZ(ProduitsRepository $ProduitsZ): Response
    {
        return $this->render('voiturevoyageurs/VVZ.html.twig', [
            'ProduitsZ' => $ProduitsZ->findBy(['id' => 26]),
        ]);
    }
    // Page produit G
    #[Route('/VVG', name: 'app_VVG')]
    public function VoitureVoyageursG(ProduitsRepository $ProduitsG): Response
    {
        return $this->render('voiturevoyageurs/VVG.html.twig', [
            'ProduitsG' => $ProduitsG->findBy(['id' => 28]),
        ]);
    }
}
