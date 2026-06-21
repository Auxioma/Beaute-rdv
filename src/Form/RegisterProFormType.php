<?php

namespace App\Form;

use App\Form\Model\RegisterProData;
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

final class RegisterProFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('establishmentName', TextType::class, [
                'constraints' => [
                    new NotBlank(message: 'Veuillez renseigner le nom de votre établissement.'),
                    new Length(max: 190),
                ],
            ])
            ->add('firstname', TextType::class, [
                'constraints' => [
                    new NotBlank(message: 'Veuillez renseigner votre prénom.'),
                    new Length(max: 120),
                ],
            ])
            ->add('lastname', TextType::class, [
                'constraints' => [
                    new NotBlank(message: 'Veuillez renseigner votre nom.'),
                    new Length(max: 120),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(message: 'Veuillez renseigner votre email professionnel.'),
                    new Email(message: 'Veuillez saisir une adresse email valide.'),
                    new Length(max: 180),
                ],
            ])
            ->add('phone', TextType::class, [
                'constraints' => [
                    new NotBlank(message: 'Veuillez renseigner votre téléphone.'),
                    new Length(max: 32),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'constraints' => [
                    new NotBlank(message: 'Veuillez renseigner un mot de passe.'),
                    new Length(
                        min: 8,
                        max: 4096,
                        minMessage: 'Votre mot de passe doit contenir au moins {{ limit }} caractères.',
                    ),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'constraints' => [
                    new IsTrue(message: 'Vous devez accepter les conditions pour créer votre espace professionnel.'),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RegisterProData::class,
        ]);
    }
}
