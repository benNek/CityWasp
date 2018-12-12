<?php

namespace App\Form;

use App\Entity\CarFilter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FiltersForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marke', ChoiceType::class, array(
              'label' => 'Markė',
              'choices' => array(
                  'BMW' => 1,
                  'Audi' => 2,
                  'Skoda' => 3,
                  'Volkswagen' => 4,
                  'Opel' => 5,
              ),
            ))
            ->add('pavaru_deze', ChoiceType::class, array(
              'label' => 'Pavarų dėžė',
              'choices' => array(
                  'Mechaninė' => 1,
                  'Automatinė' => 2,
              ),
            ))
            ->add('metai_nuo', NumberType::class, array(
              'label' => 'Metai nuo',
              'required' => false,
            ))
            ->add('metai_iki', NumberType::class, array(
              'label' => 'Metai iki',
              'required' => false,
            ))
            ->add('kaina_nuo', NumberType::class, array(
              'label' => 'Kaina nuo (€/min)',
              'required' => false,
            ))
            ->add('kaina_iki', NumberType::class, array(
              'label' => 'Kaina iki (€/min)',
              'required' => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CarFilter::class,
            'transmissions' => null,
        ));
    }
}
