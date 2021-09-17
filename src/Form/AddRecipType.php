<?php

namespace App\Form;

use App\Entity\Recip;
use App\Form\AddIngredientType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class AddRecipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la recette : ',
                'attr' => [
                    'placeholder' => 'concombre frit',
                    'class' => 'mx-1 my-2 rounded shadow-sm'
                ],
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'label_attr' => [
                    'class' => 'my-0 mt-1 i5:my-2 '
                ]
                
            ])
            ->add('makeTime', TimeType::class, [
                'label' => 'Temps de préparation : ',
                'required'   => false,
                'attr' => [
                    'class' => 'mx-1 my-2 rounded shadow-sm'
                ],
                'label_attr' => [
                    'class' => 'my-0 mt-1 i5:my-2 '
                ]
            ])
            ->add('step', CollectionType::class, [
                'label' => 'étape de la recette ',
                'entry_type' => TextareaType::class,
                'allow_add' => true,
                'attr' => [
                    'class' => 'flex justify-around flex-wrap'
                ],
                'label_attr' => [
                    'class' => ''
                ]
            ])
            ->add('ingredient', CollectionType::class, [
                'entry_type' => AddIngredientType::class,
                'allow_add' => true,
                'attr' => [
                    'label' => 'Ingredient N°',
                    'class' => 'flex justify-around flex-wrap'
                ]
                
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistré',
                'attr' => [
                    'class' => 'bg-green-500 rounded-lg m-1 px-2'
                ]
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function finishView(FormView $view, FormInterface $form, array $option)
    {
      $thing = $form->getData();
      $view->vars['label'] = 'ulna';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recip::class,
        ]);
    }
}
