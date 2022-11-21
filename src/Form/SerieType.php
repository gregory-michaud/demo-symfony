<?php

namespace App\Form;

use App\Entity\Serie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',
                TextType::class,
                [
                    'label' => 'Title',
                    'required' => true
                ])
            ->add('overview',
                null,
                [
                    'required' => false
                ])
            ->add('status',
                ChoiceType::class,
                [
                    'choices' => [
                        'Cancelled' => 'Cancelled',
                        'Ended' => 'Ended',
                        'Returning' => 'Returning',
                    ],
                    'multiple' => false
                ]
                )
            ->add('vote')
            ->add('popularity')
            ->add('genre')
            ->add('firstAirDate',
                DateTimeType::class,
                [
                    'html5' => true,
                    'widget' => 'single_text'
                ])
            ->add('lastAirDate')
            ->add('backdrop')
            ->add('poster')
            ->add('tmdbId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }
}
