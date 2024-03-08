<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Entity\OrdersDetails;
use App\Repository\ProduitsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class CommandeControlleur extends AbstractController
{
    #[Route('/ajout', name: 'app_ajoutcommande')]
    public function add(SessionInterface $session, ProduitsRepository $productsRepository, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier', []);

        if($panier === []){
            $this->addFlash('message', 'Votre panier est vide');
            return $this->redirectToRoute('app_acceuil');
        }

        //Le panier n'est pas vide, on crée la commande
        $order = new Orders();

        // On remplit la commande
        $order->setUtilisateur($this->getUser());
        $order->setReference(uniqid());

        // On parcourt le panier pour créer les détails de commande
        foreach($panier as $item => $quantite){
            $orderDetails = new OrdersDetails();

            // On va chercher le produit
            $produit = $productsRepository->find($item);
            
            $prix = $produit->getPrix();

            // On crée le détail de commande
            $orderDetails->setProduit($produit);
            $orderDetails->setPrix($prix);
            $orderDetails->setQuantite($quantite);

            $order->addOrdersDetail($orderDetails);
        }

        // On persiste et on flush
        $em->persist($order);
        $em->flush();

        $session->remove('panier');

        $this->addFlash('message', 'Commande validée');
        return $this->redirectToRoute('app_acceuil');
    }
}
