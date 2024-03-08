<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Entity\Utilisateur;
use App\Form\ModifUtilisateurFormType;
use App\Form\ProduitsType;
use App\Form\UtilisateurType;
use App\Repository\ProduitsRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('admin/Utilisateurs')]
class AdminController extends AbstractController
{
    // Liste des Utilisateurs
    #[Route('/listeusers', name: 'ListeUtilisateurs', methods: ['GET'])]
    public function index(UtilisateurRepository $UtilisateursRepository): Response
    {
        return $this->render('admin/ListeUtilisateurs.html.twig', [
            'Utilisateurs' => $UtilisateursRepository->findAll(),
        ]);
    }
// ajout d'un nouveau utilisateur
    #[Route('/newUser', name: 'NouveauUtilisateur', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $Utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $Utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($Utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('ListeUtilisateurs', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/NouveauUtilisateur.html.twig', [
            'Utilisateur' => $Utilisateur,
            'FormAjout' => $form,
        ]);
    }
// Voir les details du utilisateur selectionné
    #[Route('/{id}', name: 'DetailUtilisateur', methods: ['GET'])]
    public function show(Utilisateur $utilisateur): Response
    {
        return $this->render('admin/DetailUtilisateur.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }
// Modif utilisateur
    #[Route('/{id}/edit', name: 'ModifUtilisateur', methods: ['GET', 'POST'])]
    public function edit(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ModifUtilisateurFormType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('ListeUtilisateurs', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/ModifUtilisateur.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }
// Supprimer un utilisateur
    #[Route('/{id}', name: 'SupprimerUtilisateur', methods: ['POST'])]
    public function delete(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilisateur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($utilisateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ListeUtilisateurs', [], Response::HTTP_SEE_OTHER);
    }
}
