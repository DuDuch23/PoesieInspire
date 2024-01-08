<?php

namespace App\Form;

use App\Entity\Poeme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PoemeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre : ',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Titre',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form_row',
                ]
            ])
            ->add('contenu', TextareaType::class, [
                'label' => 'Contenu : ',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Contenu',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form_row',
                ]
            ])
            ->add('theme', EntityType::class, [
                'label' => 'Thème : ',
                'choice_label' => 'nomTheme',
                'class' => 'App\Entity\Theme',
                'attr' => [
                    'class' => 'form-control theme',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form_group col-md-6',
                ]
            ])
            ->add('nomAuteur', TextType::class, [
                'label' => 'Nom de l\'auteur : ',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom de l\'auteur',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form_row',
                ]
            ])
            ->add('prenomAuteur', TextType::class, [
                'label' => 'Prénom de l\'auteur : ',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Prénom de l\'auteur',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form_row',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Poeme::class,
        ]);
    }
}