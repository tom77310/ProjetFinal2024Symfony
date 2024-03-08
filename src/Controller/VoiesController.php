<?php

namespace App\Controller;

use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoiesController extends AbstractController
{
    // Pages des tailles
    #[Route('/Voies', name: 'app_Voies')]
    public function Voies(PagepresentationRepository $Voies): Response
    {
        return $this->render('Voies/Voies.html.twig', [
            'Voies' => $Voies->findBy(['id' => 10]),
        ]);
    }
    // ProduitHO
    #[Route('/VoiesHO', name: 'app_VoiesHO')]
    public function VoiesHO(ProduitsRepository $ProduitsHO): Response
    {
        return $this->render('Voies/VoiesHO.html.twig', [
            'ProduitsHO' => $ProduitsHO->findBy(['id' => 34]),
        ]);
    }
    // ProduitZ
    #[Route('/VoiesZ', name: 'app_VoiesZ')]
    public function VoiesZ(ProduitsRepository $ProduitsZ): Response
    {
        return $this->render('Voies/VoiesZ.html.twig', [
            'ProduitsZ' => $ProduitsZ->findBy(['id' => 35]),
        ]);
    }
    // ProduitN
    #[Route('/VoiesN', name: 'app_VoiesN')]
    public function VoiesN(ProduitsRepository $ProduitsN): Response
    {
        return $this->render('Voies/VoiesN.html.twig', [
            'ProduitsN' => $ProduitsN->findBy(['id' => 36]),
        ]);
    }
    // ProduitG
    #[Route('/VoiesG', name: 'app_VoiesG')]
    public function VoiesG(ProduitsRepository $ProduitsG): Response
    {
        return $this->render('Voies/VoiesG.html.twig', [
            'ProduitsG' => $ProduitsG->findBy(['id' => 37]),
        ]);
    }
}
