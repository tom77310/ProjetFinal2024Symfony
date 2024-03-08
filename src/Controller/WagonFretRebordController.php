<?php

namespace App\Controller;

use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WagonFretRebordController extends AbstractController
{
 // Page des 4 tailles produits
 #[Route('/wagonrebord', name: 'app_WagonRebord')]
 public function WagonRebord(PagepresentationRepository $WagonRebord): Response
 {
     return $this->render('WagonRebord/WagonRebord.html.twig', [
         'WagonRebord' => $WagonRebord->findBy(['id' => 8]),
     ]);
 }
 // ProduitHO
 #[Route('/wagonrebordHO', name: 'app_RebordHO')]
 public function RebordHO(ProduitsRepository $ProduitsHO): Response
 {
     return $this->render('WagonRebord/RebordHO.html.twig', [
         'ProduitsHO' => $ProduitsHO->findBy(['id' => 5]),
     ]);
 }
 // ProduitZ
 #[Route('/wagonrebordZ', name: 'app_RebordZ')]
 public function RebordZ(ProduitsRepository $ProduitsZ): Response
 {
     return $this->render('WagonRebord/RebordZ.html.twig', [
         'ProduitsZ' => $ProduitsZ->findBy(['id' => 6]),
     ]);
 }
 // ProduitN
 #[Route('/wagonrebordN', name: 'app_RebordN')]
 public function ProduitN(ProduitsRepository $ProduitsN): Response
 {
     return $this->render('WagonRebord/RebordN.html.twig', [
         'ProduitsN' => $ProduitsN->findBy(['id' => 7]),
     ]);
 }
 // ProduitG
 #[Route('/wagonrebordG', name: 'app_RebordG')]
 public function ProduitG(ProduitsRepository $ProduitsG): Response
 {
     return $this->render('WagonRebord/RebordG.html.twig', [
         'ProduitsG' => $ProduitsG->findBy(['id' => 8]),
     ]);
 }
}
