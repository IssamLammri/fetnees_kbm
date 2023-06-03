<?php

namespace App\Form;

use App\Entity\Trainers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrainersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('trainerFullName')
            ->add('trainerRank')
            ->add('facebookLink')
            ->add('instegramLink')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trainers::class,
        ]);
    }
}
