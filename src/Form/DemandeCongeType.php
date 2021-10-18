<?php

namespace App\Form;

use App\Entity\DemandeConge;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeCongeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datedemande')
            ->add('datedebut')
            ->add('dateretour')
            ->add('piecejustificative')
           // ->add('collaborateur')
            ->add('typeconge')
            -> add('Envoyer', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-info'
                        ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DemandeConge::class,
        ]);
    }
}
