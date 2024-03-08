<?php

namespace App\Controller;

use App\Entity\Commandes;
use App\Entity\OrderDetails;
use App\Entity\Paiement;
use App\Entity\RetourCommande;
use App\Entity\Utilisateur;
use App\Form\AjoutPaiementFormType;
use App\Form\ModifInfosPersosFormType;
use App\Form\RetractationFormType;
use App\Repository\CommandesRepository;
use App\Repository\OrderDetailsRepository;
use App\Repository\OrdersDetailsRepository;
use App\Repository\OrdersRepository;
use App\Repository\PaiementRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class MonCompteController extends AbstractController
{
    #[Route('/moncompte', name: 'app_MonCompte',)]
    public function MonCompte(): Response
    {
        return $this->render('mon_compte/MonCompte.html.twig', [
            'controller_name' => 'MonCompteController',
        ]);
    }
    // Formulaire de retractation va peut-être sauter => formulaire d'ajout sur la bdd puis recuperer sur la partie admin
    #[Route('/moncompte/retractation', name: 'app_Retractation',)]
    public function Retractation(Request $req, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
    {
        $retour = new RetourCommande();

        $form = $this->createForm(RetractationFormType::class, $retour);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            $fichier = $form->get('PieceJointe')->getData();
            if ($fichier) {
                $originalFilename = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $nomfichier = $safeFilename . '.' . $fichier->guessExtension();
                $fichier->move(
                    $this->getParameter('fileDirectory'),
                    $nomfichier
                );
                $retour->setPieceJointe($nomfichier);
            }
            $em= $doctrine->getManager();
            $em->persist($retour);
            $em->flush();
            return $this->redirectToRoute('app_Retractation');
        }
        return $this->render('mon_compte/FormulaireRetractation.html.twig', [
            'f' => $form->createView(),
        ]);
    }









    // Conditions de remboursement
    #[Route('/moncompte/Remboursement', name: 'app_Conditions',)]
    public function Remboursement(): Response
    {
        return $this->render('mon_compte/ConditionsRemboursement.html.twig', [
            'controller_name' => 'MonCompteController',
        ]);
    }
    // Informations Personnelles de l'utilisateur
    // Liste des informations personnelles de l'utilisateur
    #[Route('/moncompte/InfosPersos', name: 'app_InfosPersos',)]
    public function InfosPersos(Request $req, ManagerRegistry $doctrine): Response
    {
        $user = $this ->getUser();
        return $this->render('mon_compte/InfosPersos.html.twig', [
            'user' => $user,
        ]);
    }

// Modif informations Personnelles de l'utilisateur
    #[Route('/ModifInfosPersos/{id}', name: 'ModifInfosPersos',)]
    public function ModifInfosPersos(Request $req, ManagerRegistry $doctrine, Utilisateur $User, EntityManagerInterface $manager): Response
    {
       
        // Verification que le bon utilisateur modifie son compte et pas un autre autre compte
        if(!$this->getUser()){
            return $this->redirectToRoute('app_login'); // Si non connecter redirection sur la page d'authentification
        }
        // Verification que l'utilisateur qu'on a recupérer est bien celui qui est connecté
        if($this->getUser() !== $User){
            return $this->redirectToRoute('app_acceuil'); // si connecter au mauvais compte redirection sur la page d'acceuil
        }

        // Creation formulaire modif infos persos
        $form = $this->createForm(ModifInfosPersosFormType::class, $User);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            $User = $form->getData();
            $manager->persist($User);
            $manager->flush();
            return $this->redirectToRoute('app_InfosPersos');
        }
        return $this->render('mon_compte/ModifInfosPersos.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /// Historique de commande de l'utilisateur (Vas sauter a part s'y j'y arrive avant l'examen)
    #[Route('/moncompte/historique', name: 'app_Historique')]
    public function index(OrdersDetailsRepository $orderDetailsRepository, OrdersRepository $CommandeRepository, $OrdersId): Response
    {
    //     // $commande = $this->$this->getDoctrine()->getRepository(Commandes::class)->find($OrdersId);
        // $utilisateur = $this->getUser();
    // $utilisateur->getOrders();
    //     // $commande = $CommandeRepository->find($OrdersId);
    //     // return $this->render('mon_compte/Historique.html.twig', [
    //     //     'order_details' => $orderDetailsRepository,
    //     // ]);
    return $this->render('mon_compte/Historique.html.twig', [
        'controller_name' => 'MonCompteController',
    ]);
    }

    
    // Moyens de paiement de l'utilisateur enregistré
    // Liste des paiement de l'utilisateur
    #[Route('/moncompte/Paiement', name: 'app_Paiement',)]
    public function Paiement(PaiementRepository $paiementRepository): Response
    {
        return $this->render('mon_compte/Paiement.html.twig', [
            'paiement' => $paiementRepository->findBy([]),
        ]);
    }
    // ajout paiement
    #[Route('/moncompte/Paiement/ajout', name: 'app_ajoutPaiement',)]
    public function ajoutPaiement(Request $request, EntityManagerInterface $em): Response
    {

        $paiement = new Paiement();
        $form = $this->createForm(AjoutPaiementFormType::class, $paiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($paiement);
            $em->flush();
            return $this->redirectToRoute('app_Paiement');
        }



        return $this->render('mon_compte/AjoutPaiement.html.twig', [
            'paiement' => $paiement,
            'form' => $form,
        ]);
    }
}
