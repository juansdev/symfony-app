<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // First name field
            ->add('name', TextType::class, [
                'label' => 'Nombre',
                'attr' => [
                    'placeholder' => 'Ingrese su nombre',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'El nombre es obligatorio',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'El nombre debe tener al menos {{ limit }} caracteres',
                        'max' => 50,
                        'maxMessage' => 'El nombre debe tener al menos {{ limit }} caracteres',
                    ]),
                ],
            ])
            // Last name field
            ->add('lastname', TextType::class, [
                'label' => 'Apellido',
                'attr' => [
                    'placeholder' => 'Ingrese su apellido',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'El apellido es obligatorio',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'El apellido debe tener al menos {{ limit }} caracteres',
                        'max' => 50,
                        'maxMessage' => 'El apellido debe tener al menos {{ limit }} caracteres',
                    ]),
                ],
            ])
            // Email field
            ->add('email', EmailType::class, [
                'label' => 'Correo electrónico',
                'attr' => [
                    'placeholder' => 'Ingrese su correo electrónico',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'El correo electrónico es obligatorio',
                    ]),
                    new Email([
                        'message' => 'El correo electrónico no es válido',
                    ]),
                ],
            ])
            // Password field
            ->add('password', PasswordType::class, [
                'label' => 'Contraseña',
                'attr' => [
                    'placeholder' => 'Ingrese su contraseña',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La contraseña es obligatoria',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'La contraseña debe tener al menos {{ limit }} caracteres',
                        'max' => 50,
                        'maxMessage' => 'La contraseña debe tener al menos {{ limit }} caracteres',
                    ]),
                ],
            ])
            // Submit button
            ->add('submit', SubmitType::class, [
                'label' => 'Guardar',
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
