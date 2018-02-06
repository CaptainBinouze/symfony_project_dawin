<?php

// Form/PizzaType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('description')
            ->add('ingredients', CollectionType::class, array(
                'entry_type' => IngredientType::class,
                'entry_options' => array('label' => false),
                'by_reference' => false,
                'allow_add' => true,
            ));
    }

    public function getName()
    {
        return 'pizza_form';
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Pizza',
        ]);
    }

}