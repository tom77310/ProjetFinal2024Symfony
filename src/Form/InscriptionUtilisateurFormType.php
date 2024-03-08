<?php

namespace App\Form;

use App\Entity\Utilisateur;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionUtilisateurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'attr' => [
                'class' => 'Nom',
              'required' => 'true',
            ],
            'label' => 'Nom de Famille*',
        ])
        ->add('prenom', TextType::class, [
            'attr' => [
                'class' => 'Prenom',
             'required' => 'true',
            ],
            'label' => 'Prenom*',
        ])
        ->add('adresse', TextType::class, [
            'attr' => [
                'class' => 'Adresse',
            'required' => 'true',
            ],
            'label' => 'Adresse Postal*',
        ])
        ->add('cp', NumberType::class, [
            'attr' => [
             'minlength' => '1',
              'maxlength' => '5',
              'class' => 'CodePostal',
              'required' => false
            ],
            'label' => 'Code Postale',
        ])
        
        ->add('ville', TextType::class, [
            'attr' => [
                'class' => 'Ville',
                'label' => 'Ville',
               'required' => false,
            ]
        ])

        ->add('telephone', NumberType::class, [
            'attr' => [
                'minlength' => '1', 
                'maxlength' => '12',
                 'required' =>'false',
                 'class' => 'Telephone',
            ],
            'label' => 'Numero de Telephone',

        ])        
        ->add('email', EmailType::class, [
            'attr' => [
                'class' => 'Email',
                'required' => false,
            ],
                'label' => 'Email*',
        ])

        ->add('password', PasswordType::class, [
            'required' => true,
            'attr' => [
                'minlength' => '12', 
                'pattern' => '[a-zA-Z0-9]{12,50}', // Sécurise le Mot de Passe coté formulaire
                'class' => 'Mdp',
            ],
            'label' => 'Mot de Passe',
        ])
        ->add('roles', ChoiceType::class, [
            'required' => false,
            'multiple' => true,
            'expanded' => false,
            'choices' => [
                'Administrateur' => 'ROLE_ADMIN',
                'Utilisateur' => 'ROLE_USER'
            ],
            'attr' => [
                'class' => 'role',
            ],
        ])
        ->add('save', SubmitType::class, [
            'label' => 'Inscription',
            'attr' => [
                'class' => 'inscription',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
