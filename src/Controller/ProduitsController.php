<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Repository\ProduitsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('admin/produits')]
class ProduitsController extends AbstractController
{
    // Liste des produits
    #[Route('/listeproduits', name: 'ListeProduits', methods: ['GET'])]
    public function index(ProduitsRepository $produitsRepository): Response
    {
        return $this->render('produits/ListeProduits.html.twig', [
            'produits' => $produitsRepository->findAll(),
        ]);
    }
// ajout d'un nouveau produit
    #[Route('/newproduits', name: 'NewProduits', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $produit = new Produits();
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('ListeProduits', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produits/NouveauProduit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }
// Voir les details du produits selectionné
    #[Route('/{id}', name: 'DetailProduit', methods: ['GET'])]
    public function show(Produits $produit): Response
    {
        return $this->render('produits/DetailProduit.html.twig', [
            'produit' => $produit,
        ]);
    }
// Modif produit
    #[Route('/{id}/edit', name: 'ModifProduit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Produits $produit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('ListeProduits', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produits/ModifProduit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }
// Supprimer un produit
    #[Route('/{id}', name: 'SupprimerProduit', methods: ['POST'])]
    public function delete(Request $request, Produits $produit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ListeProduits', [], Response::HTTP_SEE_OTHER);
    }
}
