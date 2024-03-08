<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(SessionInterface $session, ProduitsRepository $productsRepository):Response
    {
        $panier=$session->get('panier', []);
        $dataPanier = [];
        $total =0;

        foreach($panier as $id => $quantite){
            $produits = $productsRepository->find($id);
            $dataPanier[] = [
                "produit" => $produits, 
                "quantite" => $quantite
            ];
            $total += $produits->getPrix() * $quantite;
        }



        return $this->render('panier/index.html.twig', compact("dataPanier", "total"));
    }

    // // Ajout panier
    #[Route('/ajoutpanier/{id}', name: 'app_ajoutpanier')]
    public function AjoutPanier(Produits $produits, SessionInterface $session):Response
    {
       
        $id = $produits->getId();

        $panier = $session->get("panier", []);
        
        // dd($session);
        if(!empty($panier[$id])){
            $panier[$id]++;
        }else{
            $panier[$id] = 1;
        }

        $session->set("panier", $panier);


        // dd($session);
        
        
        return $this->redirectToRoute('app_panier');
    }
    // Diminuer la quantité
    #[Route('/remove/{id}', name: 'enlever_produit')]
    public function RemovePanier(Produits $produits, SessionInterface $session):Response
    {
       
        $id = $produits->getId();

        $panier = $session->get("panier", []);
        
        
        if(!empty($panier[$id])){

            if($panier[$id]>1){
                $panier[$id]--;
            }else{
                unset($panier[$id]);
            }
            
        }

        $session->set("panier", $panier);


        // dd($session);
        
        
        return $this->redirectToRoute('app_panier');
    }
    // Supprimer le produit en entier
    #[Route('/supprimer/{id}', name: 'app_suppr')]
    public function SupprimerProduit(Produits $produits, SessionInterface $session):Response
    {
       
        $id = $produits->getId();

        $panier = $session->get("panier", []);
        
        
        if(!empty($panier[$id])){

 
                unset($panier[$id]);
            }
            
        

        $session->set("panier", $panier);


        // dd($session);
        
        
        return $this->redirectToRoute('app_panier');
    }

    // Supprimer le panier en entier
    #[Route('/supprimerPanier', name: 'supprPanier')]
    public function SupprimerPanier(SessionInterface $session):Response
    {
       
                           
        

        $session->remove("panier");


        // dd($session);
        
        
        return $this->redirectToRoute('app_panier');
    }

}




