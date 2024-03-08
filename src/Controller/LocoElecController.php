<?php

namespace App\Controller;

use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocoElecController extends AbstractController
{
    // Page locoElec avec les 4 tailles disponibles
    #[Route('/locoelec', name: 'app_locoelec')]
    public function PageLocoElec(PagepresentationRepository $LocoElecPresentation): Response
    {
        return $this->render('loco_elec/LocoElec.html.twig', [
            'LocoElec' => $LocoElecPresentation->findBy(['id' => 5]),
        ]);
    }
    // Page locoElec produitHO
    #[Route('/locoelecproduitHO', name: 'app_locoelecHO')]
    public function PageProduitLocoElecHO(ProduitsRepository $ProduitHO): Response
    {
     return $this->render('loco_elec/produitHO.html.twig', [
            'ProduitHO' => $ProduitHO->findBy(['id' => 21]),
        ]);
    }
    // Page locoElec produitZ
    #[Route('/locoelecproduitZ', name: 'app_locoelecZ')]
    public function PageProduitLocoElecZ(ProduitsRepository $ProduitZ): Response
    {
        return $this->render('loco_elec/produitZ.html.twig', [
            'ProduitZ' => $ProduitZ->findBy(['id' => 22]),
        ]);
    }
    // Page locoElec produitN
    #[Route('/locoelecproduitN', name: 'app_locoelecN')]
    public function PageProduitLocoElecN(ProduitsRepository $ProduitN): Response
    {
        return $this->render('loco_elec/produitN.html.twig', [
            'ProduitN' => $ProduitN->findBy(['id' => 23]),
        ]);
    }
    // Page locoElec produitG
    #[Route('/locoelecproduitG', name: 'app_locoelecG')]
    public function PageProduitLocoElecG(ProduitsRepository $ProduitG): Response
    {
        return $this->render('loco_elec/produitG.html.twig', [
            'ProduitG' => $ProduitG->findBy(['id' => 24]),
        ]);
    }
}
