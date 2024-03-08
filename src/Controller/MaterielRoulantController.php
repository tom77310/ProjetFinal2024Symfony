<?php

namespace App\Controller;

use App\Repository\PageprincipalesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class MaterielRoulantController extends AbstractController
{

    #[Route('/materielroulant', name: 'app_materiel_roulant')]
        public function index(PageprincipalesRepository $MaterielRoulantPrincipale): Response
    {
        return $this->render('materiel_roulant/materielroulant.html.twig', [
            'MaterielRoulant' => $MaterielRoulantPrincipale->findBy(['id' => 1]),
        ]);
    }
    #[Route('/locomotives', name: 'app_locomotives')]
    public function PageLocomotive(PageprincipalesRepository $LocomotivesPrincipale): Response
    {
        return $this->render('materiel_roulant/loco.html.twig', [
            'Locomotives' => $LocomotivesPrincipale->findBy(['id' => 2]),
        ]);
    }
    #[Route('/automotrice', name: 'app_automotrice')]
    public function PageAutomotrices(PageprincipalesRepository $AutomotricesPrincipale): Response
    {
        return $this->render('materiel_roulant/automotrices.html.twig', [
            'Automotrices' => $AutomotricesPrincipale->findBy(['id' => 4]),
        ]);
    }
    #[Route('/wagonfret', name: 'app_wagonfret')]
    public function PageWagonFret(PageprincipalesRepository $WagonFretPrincipale): Response
    {
        return $this->render('materiel_roulant/wagonfret.html.twig', [
            'WagonFret' => $WagonFretPrincipale->findBy(['id' => 3]),
        ]);
    }
}
