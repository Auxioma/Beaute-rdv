<?php

namespace App\Form;

use App\Form\Model\RegisterUserData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

final class RegisterUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'constraints' => [
                    new NotBlank(message: 'auth.validation.firstname_required'),
                    new Length(max: 120),
                ],
            ])
            ->add('lastname', TextType::class, [
                'constraints' => [
                    new NotBlank(message: 'auth.validation.lastname_required'),
                    new Length(max: 120),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(message: 'auth.validation.email_required'),
                    new Email(message: 'auth.validation.email_invalid'),
                    new Length(max: 180),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'constraints' => [
                    new NotBlank(message: 'auth.validation.password_required'),
                    new Length(
                        min: 8,
                        max: 4096,
                        minMessage: 'auth.validation.password_min',
                    ),
                ],
            ])
            ->add('defaultCity', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Length(max: 120),
                ],
            ])
            ->add('marketingEmailConsent', CheckboxType::class, [
                'required' => false,
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'constraints' => [
                    new IsTrue(message: 'auth.validation.user_terms_required'),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RegisterUserData::class,
        ]);
    }
}
