<?php

namespace App\Form;

use App\Entity\RetourCommande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class RetractationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Nom', TextType::class, [
            'attr' => [
                'class' => 'Nom',
               'required' =>'false',
            ]
        ])
        ->add('Prenom', TextType::class, [
            'attr' => [
                'class' => 'Prenom',
                'required' =>'false',
            ]
        ] )
        ->add('email', EmailType::class, [
            'attr' => [
                'class' => 'Email',
                'required' =>'false',
            ]
        ] )
        ->add('telephone', NumberType::class,  [
            'attr' => [
                'minlength' => '1',
                'maxlength' => '10',
                'class' => 'Telephone',
                'required' =>'false',
            ]
        ])
        ->add('Sujet', TextType::class, [
            'attr' => [
                'class' => 'Sujet',
                'required' =>'false',
            ]
        ] )
        ->add('message', TextType::class, [
            'attr' => [
                'class' => 'Message',
                'required' =>'false',
            ]
        ] )
        ->add('PieceJointe', FileType::class,
            [
                "attr" => ['class' => "form-control"],
                "label" => "Pièce jointe",
                "data_class" => null,
                "required" => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2500k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/jpg',
                        ]
                    ])
                ]
            ]
        )
        ->add('save', SubmitType::class, ['label' => 'Enregistrer et envoyer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RetourCommande::class,
        ]);
    }
}
