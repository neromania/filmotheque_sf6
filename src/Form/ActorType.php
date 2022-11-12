<?php

namespace App\Form;

use App\Entity\Actor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ActorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                "label" => "prénom ",
            ])
            ->add('lastname', TextType::class, ['label' => "nom "])
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
                'label' => "date de naissance ",
            ])
            ->add('gender', ChoiceType::class, [
                "choices" => [
                    "homme" => "h",
                    "femme" => "f",
                    "autres" => "x",
                ],
                "label" => "genre ",
            ])
            ->add('movies')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actor::class,
        ]);
    }
}
