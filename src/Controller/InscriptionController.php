<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionUtilisateurFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function Inscription(Request $request, UserPasswordHasherInterface $hashpwd, ManagerRegistry $doctrine): Response
    {
        $user = new Utilisateur();
        $form = $this->createForm(InscriptionUtilisateurFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $user->setNom($form->get("nom")->getData());
            $user->setPrenom($form->get("prenom")->getData());
            $user->setEmail($form->get("email")->getData());
            $user->setPassword($hashpwd->hashPassword($user, $form->get("password")->getData()));
            $user->setAdresse($form->get("adresse")->getData());
            $user->setVille($form->get("ville")->getData());
            $user->setCP($form->get("cp")->getData());
            $user->setTelephone($form->get("telephone")->getData());
            $user->setRoles($form->get("roles")->getData());
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('app_login');

        }
        return $this->render('inscription/index.html.twig', [
            'f' => $form->createView()
        ]);
    }
}
