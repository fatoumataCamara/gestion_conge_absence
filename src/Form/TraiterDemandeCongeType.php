<?php

namespace App\Form;

use App\Entity\TraiterDemandeConge;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraiterDemandeCongeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('atraiter', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui' ,
                    'Non' => 'Non'
                ],
                'expanded' => true,
                'label' => 'Avez-vous traité la demande ?'
            ])
            ->add('datetraitement')
            ->add('avis', ChoiceType::class, [
                'choices' => [
                    'Acceptée' => 'Acceptée' ,
                    'Refusée' => 'Refusée'
                ],
                'expanded' => true,
                'label' => 'Quel est votre avis concernant cette demande de congé ?'
            ])
            -> add('Valider', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-info'
                        ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TraiterDemandeConge::class,
        ]);
    }
}
