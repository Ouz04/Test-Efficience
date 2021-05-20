<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Departement;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom',TextType::class,[
                'label'=>'Prenom',
                'attr'=>[
                    'placeholder'=>'Votre prenom'
                ]
            ])
            ->add('nom', TextType::class,
                [
                    'label'=>'Nom',
                    'attr'=>[
                        'placeholder'=>'Votre nom'
                    ]
                ])
            ->add('email',EmailType::class,
                [
                    'label'=>'Email',
                    'attr'=>[
                        'placeholder'=>'Votre email'
                    ]
                ])
            ->add('departement',EntityType::class,
                [
                    'label'=>'Departement',
                    'placeholder'=>'-- choisir un département --',
                    'class'=> Departement::class,
                    'choice_label'=> function(Departement $departement){
                        return strtoupper($departement->getNom());
                    }

                ])

            ->add('message', TextareaType::class,
                [
                    'label'=>'Message',
                    'attr'=>[
                        'placeholder'=>'Votre message'
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
