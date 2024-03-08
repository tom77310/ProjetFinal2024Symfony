<?php

namespace App\Controller;

use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AutorailsController extends AbstractController
{
    // page avec les 3 tailles
    #[Route('/Autorails', name: 'app_Autorails')]
    public function Autorails(PagepresentationRepository $Autorails): Response
    {
        return $this->render('Autorails/Autorails.html.twig', [
            'Autorails' => $Autorails->findBy(['id' => 2]),
        ]);
    }
    // produit HO
    #[Route('/AutorailsHO', name: 'app_AutorailsHO')]
    public function ProduitHO(ProduitsRepository $ProduitsHO): Response
    {
        return $this->render('Autorails/AutorailsHO.html.twig', [
            'ProduitsHO' => $ProduitsHO->findBy(['id' => 31]),
        ]);
    }
    // produitN
    #[Route('/AutorailsN', name: 'app_AutorailsN')]
    public function ProduitN(ProduitsRepository $ProduitsN): Response
    {
        return $this->render('autorails/AutorailsN.html.twig', [
            'ProduitsN' => $ProduitsN->findBy(['id' => 32]),
        ]);
    }
    // produitG
    #[Route('/AutorailsG', name: 'app_AutorailsG')]
    public function ProduitG(ProduitsRepository $ProduitsG): Response
    {
        return $this->render('autorails/AutorailsG.html.twig', [
            'ProduitsG' => $ProduitsG->findBy(['id' => 33]),
        ]);
    }
}
