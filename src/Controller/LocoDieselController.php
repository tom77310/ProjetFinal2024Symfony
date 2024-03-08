<?php

namespace App\Controller;

use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocoDieselController extends AbstractController
{
    // Page locoDiesel avec les 4 tailles disponibles
    #[Route('/locodiesel', name: 'app_locodiesel')]
    public function PageLocoDiesel(PagepresentationRepository $LocoDieselPresentation): Response
    {
        return $this->render('loco_diesel/LocoDiesel.html.twig', [
            'LocoDiesel' => $LocoDieselPresentation->findBy(['id' => 6]),
        ]);
    }
    // Page locoDiesel produitHO
    #[Route('/locodieselproduitHO', name: 'app_locodieselHO')]
    public function PageProduitLocoDieselHO(ProduitsRepository $ProduitHO): Response
    {
     return $this->render('loco_diesel/produitHO.html.twig', [
        'ProduitHO' => $ProduitHO->findBy(['id' => 17]),
        ]);
    }
    // Page locoDiesel produitZ
    #[Route('/locodieselproduitZ', name: 'app_locodieselZ')]
    public function PageProduitLocoDieselZ(ProduitsRepository $ProduitZ): Response
    {
        return $this->render('loco_diesel/produitZ.html.twig', [
            'ProduitZ' => $ProduitZ->findBy(['id' => 18]),
        ]);
    }
    // Page locoDiesel produitN
    #[Route('/locodieselproduitN', name: 'app_locodieselN')]
    public function PageProduitLocoDieselN(ProduitsRepository $ProduitN): Response
    {
        return $this->render('loco_diesel/produitN.html.twig', [
            'ProduitN' => $ProduitN->findBy(['id' => 19]),
        ]);
    }
    // Page locoDiesel produitG
    #[Route('/locodieselproduitG', name: 'app_locodieselG')]
    public function PageProduitLocoDieselG(ProduitsRepository $ProduitG): Response
    {
        return $this->render('loco_diesel/produitG.html.twig', [
            'ProduitG' => $ProduitG->findBy(['id' => 20]),
        ]);
    }
}
