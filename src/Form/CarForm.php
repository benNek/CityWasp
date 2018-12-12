<?php

namespace App\Form;

use App\Entity\Automobilis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CarForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fk_marke', ChoiceType::class, array(
              'label' => 'Markė',
              'choices' => array(
                  'BMW' => 1,
                  'Audi' => 2,
                  'Skoda' => 3,
                  'Volkswagen' => 4,
                  'Opel' => 5,
              ),
            ))
            ->add('modelis', TextType::class, array(
              'label' => 'Modelis',
            ))
            ->add('pagaminimo_metai', NumberType::class, array(
              'label' => 'Pagaminimo metai',
            ))
            ->add('valstybinis_nr', TextType::class, array(
              'label' => 'Valstybinis numeris',
            ))
            ->add('pavaru_deze', ChoiceType::class, array(
              'label' => 'Pavarų dėžė',
              'choices' => array(
                  'Mechaninė' => 1,
                  'Automatinė' => 2,
              ),
            ))
            ->add('kuras', ChoiceType::class, array(
              'label' => 'Kuro tipas',
              'choices' => array(
                  'Benzinas' => 'Benzinas',
                  'Dyzelis' => 'Dyzelis',
                  'Hybridas' => 'Hybridas',
                  'Elektromobilis' => 'Elektromobilis',
              ),
            ))
            ->add('duru_skaicius', ChoiceType::class, array(
              'label' => 'Durų skaičius',
              'choices' => array(
                  '2' => 2,
                  '4' => 4,
              ),
            ))
            ->add('variklis', NumberType::class, array(
              'label' => 'Variklio darbinis tūris',
            ))
            ->add('minutes_kaina', NumberType::class, array(
              'label' => 'Minutės kaina €',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Automobilis::class,
            'transmissions' => null,
        ));
    }
}
