<?php

namespace App\Form;

use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class AddIngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom de l'ingredient : ",
                'attr' => [
                    'placeholder' => 'concombre',
                ]
                
            ])
            ->add('quantity', IntegerType::class, [
                'label' => "Quantité d'ingrédient : ",
            ])
            ->add('unity', ChoiceType::class, [
                'label' => "Unité : ",
                'choices'  => [
                    'gramme' => 'g',
                    'mililitre' => 'ml',
                    'litre' => 'l',
                    'unité' => 'unité',
                ],
            ])
            ->add('outDate', DateType::class, [
                'label' => 'Date de péremption : ',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ingredient::class,
        ]);
    }
}
