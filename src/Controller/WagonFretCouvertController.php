<?php

namespace App\Controller;

use App\Entity\Pagepresentation;
use App\Repository\PagepresentationRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WagonFretCouvertController extends AbstractController
{
  // Page des 4 tailles produits
  #[Route('/wagoncouvert', name: 'app_WagonCouvert')]
  public function WagonCouvert(PagepresentationRepository $WagonCouvert): Response
  {
      return $this->render('WagonCouvert/WagonCouvert.html.twig', [
        'WagonCouvert' => $WagonCouvert->findBy(['id' => 9]),
    ]);
  }
  // ProduitHO
  #[Route('/wagoncouvertHO', name: 'app_CouvertHO')]
  public function CouvertHO(ProduitsRepository $CouvertHO): Response
  {
      return $this->render('WagonCouvert/CouvertHO.html.twig', [
          'CouvertHO' => $CouvertHO->findBy(['id' => 1]),
      ]);
  }
  // ProduitZ
  #[Route('/wagoncouvertZ', name: 'app_CouvertZ')]
  public function CouvertZ(ProduitsRepository $CouvertZ): Response
  {
      return $this->render('WagonCouvert/CouvertZ.html.twig', [
          'CouvertZ' => $CouvertZ->findBy(['id' => 2]),
      ]);
  }
  // ProduitN
  #[Route('/wagoncouvertN', name: 'app_CouvertN')]
  public function ProduitN(ProduitsRepository $CouvertN): Response
  {
      return $this->render('WagonCouvert/CouvertN.html.twig', [
          'CouvertN' => $CouvertN->findBy(['id' => 3]),
      ]);
  }
  // ProduitG
  #[Route('/wagoncouvertG', name: 'app_CouvertG')]
  public function ProduitG(ProduitsRepository $CouvertG): Response
  {
      return $this->render('WagonCouvert/CouvertG.html.twig', [
          'CouvertG' => $CouvertG->findBy(['id' => 4]),
      ]);
  }
}
