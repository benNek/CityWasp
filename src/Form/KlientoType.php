<?php

namespace App\Form;

use App\Entity\Klientas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class KlientoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vardas', TextType::class, array(
                'label' => 'Vardas',
            ))
            ->add('pavarde', TextType::class, array(
                'label' => 'Pavardė',
            ))
            ->add('slaptazodis', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Įveskite slaptažodį'),
                'second_options' => array('label' => 'Pakartokite slaptažodį')
            ))
            ->add('adresas', TextType::class, array(
                'label' => 'Adresas'))
            ->add('gimimo_data', DateType::class, array(
                'label' => 'Gimimo data',
                'widget' => 'choice',
            ))
            ->add('tel_nr', TextType::class, array(
                'label' => 'Tel. nr.',
            ))
            ->add('el_pastas', EmailType::class, array(
                'label' => 'El. paštas',
            ))
            ->add('naujienlaiskiai', ChoiceType::class, array(
                'choices' => array(
                    'Taip' => 1,
                    'Ne' => 0,
                ),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Klientas::class,
        ]);
    }
}
