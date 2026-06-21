<?php

namespace App\Controller\Auth;

use App\Entity\Auth\User;
use App\Form\RegistrationFormType;
use App\Repository\Auth\UserRepository;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;final class VerifyEmailController extends AbstractController
{
    public function __construct(private EmailVerifier $emailVerifier)
        {
        }

    #[Route('/verify/email', name: 'app_verify_email')]
        public function verifyUserEmail(Request $request, TranslatorInterface $translator, UserRepository $userRepository): Response
        {
            $userId = $request->query->get('id');
            $user = null !== $userId ? $userRepository->find($userId) : null;

            if (!$user instanceof User) {
                $this->addFlash('verify_email_error', 'Unable to verify your email address.');

                return $this->redirectToRoute('app_register');
            }

            // validate email confirmation link, sets User::isVerified=true and persists
            try {
                $this->emailVerifier->handleEmailConfirmation($request, $user);
            } catch (VerifyEmailExceptionInterface $exception) {
                $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

                return $this->redirectToRoute('app_register');
            }

            // @TODO Change the redirect on success and handle or remove the flash message in your templates
            $this->addFlash('success', 'Your email address has been verified.');

            return $this->redirectToRoute('app_login');
        }
}
