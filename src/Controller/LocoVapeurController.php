<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocoVapeurController extends AbstractController
{
    // Page locoVapeur avec les 4 tailles disponibles
    #[Route('/locovapeur', name: 'app_locovapeur')]
    public function PageLocoVapeur(PagepresentationRepository $pagepresentationRepository): Response
    {
        return $this->render('loco_vapeur/LocoVapeur.html.twig', [
            'LocoVapeur' => $pagepresentationRepository->findBy(['id' => 1]),
        ]);
    }
    // Page locoVapeur produitHO
    #[Route('/locovapeurproduitHO', name: 'app_locovapeurHO')]
    public function PageProduitLocoVapeurHO(ProduitsRepository $LocoVapeurHO): Response
    {
     return $this->render('loco_vapeur/produitHO.html.twig', [
            'ProduitHO' => $LocoVapeurHO->findBy(['id' => 13]),
        ]);
    }
    // Page locoVapeur produitZ
    #[Route('/locovapeurproduitZ', name: 'app_locovapeurZ')]
    public function PageProduitLocoVapeurZ(ProduitsRepository $LocoVapeurZ): Response
    {
        return $this->render('loco_vapeur/produitZ.html.twig', [
            'ProduitZ' => $LocoVapeurZ->findBy(['id' => 14]),
        ]);
    }
    // Page locoVapeur produitN
    #[Route('/locovapeurproduitN', name: 'app_locovapeurN')]
    public function PageProduitLocoVapeurN(ProduitsRepository $LocoVapeurN): Response
    {
        return $this->render('loco_vapeur/produitN.html.twig', [
            'ProduitN' => $LocoVapeurN->findBy(['id' => 15]),
        ]);
    }
    // Page locoVapeur produitG
    #[Route('/locovapeurproduitG', name: 'app_locovapeurG')]
    public function PageProduitLocoVapeurG(ProduitsRepository $LocoVapeurG): Response
    {
        return $this->render('loco_vapeur/produitG.html.twig', [
            'ProduitG' => $LocoVapeurG->findBy(['id' => 16]),
        ]);
    }
}
