<?php

namespace App\Form;

use App\Entity\Collaborateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CreateCollaborateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule')
            ->add('nom')
            ->add('prenom')
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Masculin' => 'Masculin' ,
                    'Feminin' => 'Feminin'
                ],
                'expanded' => true,
                'label' => 'sexe'
            ])
            ->add('datedenaissance')
            ->add('lieudenaissance')
            ->add('nationalite')
            ->add('religion')
            ->add('num_cni')
            ->add('num_tel')
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir une adresse email !!'
                    ])
                    ],
                    'required' => true,
                    'attr' => [
                        'class' => 'form-control'
                    ]
            ])
            ->add('adresse')
            ->add('fonction')
            ->add('categorie')
            ->add('date_recrut')
            ->add('situation_matri', ChoiceType::class, [
                'choices' => [
                    'Marié(e)' => 'Marié(e)' ,
                    'Célibataire' => 'Célibataire',
                    'Veuf(ve)' => 'Veuf(ve)'
                ],
                'expanded' => true,
                //'multiple' => true,
                'label' => 'situation_matri'
            ])
            ->add('nombre_enfant')
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
            'data_class' => Collaborateur::class,
        ]);
    }
}
