<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::class, [
                'label' => "votre email",
                'attr' => [
                    'placeholder' => 'exemple@mail.fr',
                    'class' => 'mx-2'
                ],
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ])
            ])
            ->add('password',PasswordType::class, [
                'label' => "votre mdp",
                'attr' => [
                    'placeholder' => 'password',
                    'class' => 'mx-2'
                ]

            ])
            ->add('submit', SubmitType::class, [
                'label' => "s'inscire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
