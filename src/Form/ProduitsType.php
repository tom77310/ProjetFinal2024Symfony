<?php

namespace App\Form;

use App\Entity\Produits;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom du produit',
                'attr' => [
                    'class' => 'nom',
                    'required' => 'false',
                ],
            ])
            ->add('prix', NumberType::class, [
                'attr' => [
                    'class' => 'prix',
                    'required' => 'false',
                ],
                'label' => 'Prix du produit',
            ])
            ->add('detail', TextareaType::class, [
                'attr' => [
                    'class' => 'detail',
                    'required' => 'false',
                ],
                'label' => 'Description du produit',
            ])

            ->add('quantite', NumberType::class, [
                'label' => 'Quantité',
                'attr' => [
                    'class' => 'quantite',
                    'required' => 'false',
                ]
            ])
            ->add('vue1', FileType::class, [
                'label' => 'Image numero 1',
                'data_class' => null,
                'constraints' => [
                    new File([
                        'maxSize' => '2500k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                    ]),
                ],
                'attr' => [
                    'class' => 'Image1',
                ],
                    'required' => 'false',
            ])
            ->add('vue2', FileType::class, [
                'label' => 'Image numero 2',
                'data_class' => null,
                'constraints' => [
                    new File([
                        'maxSize' => '2500k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                    ]),
                ],
                'attr' => [
                    'class' => 'Image2',
                ],
                    'required' => 'false',
            ])
            ->add('vue3', FileType::class, [
                'label' => 'Image numero 3',
                'data_class' => null,
                'constraints' => [
                    new File([
                        'maxSize' => '2500k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                    ]),
                ],
                'attr' => [
                    'class' => 'Image3',
                ],
                'required' => 'false',
            ])
            ->add('vue4', FileType::class, [
                'label' => 'Image numero 4',
                'data_class' => null,
                'constraints' => [
                    new File([
                        'maxSize' => '2500k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                    ]),
                ],
                'attr' => [
                    'class' => 'Image4',
                ],
                    'required' => 'false',
            ])
            ->add('vue5', FileType::class, [
                'label' => 'Image numero 5',
                'data_class' => null,
                'constraints' => [
                    new File([
                        'maxSize' => '2500k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                    ]),
                ],
                'attr' => [
                    'class' => 'Image5',
                ],
                    'required' => 'false',
            ])
            ->add('nom_categorie', TextType::class, [
                'label' => 'Nom de la Categorie associée',
                'attr' => [
                    'class' => 'nom_categorie',
                    'required' => 'false',
                ]
            ],
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produits::class,
        ]);
    }
}
