<?php

namespace App\Controller\Auth;

use App\Entity\Auth\User;
use App\Form\ChangePasswordFormType;
use App\Form\ResetPasswordRequestFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\ResetPassword\Controller\ResetPasswordControllerTrait;
use SymfonyCasts\Bundle\ResetPassword\Exception\ResetPasswordExceptionInterface;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;#[Route('/reset-password')]
final class CheckEmailController extends AbstractController
{
    use ResetPasswordControllerTrait;

        public function __construct(
            private ResetPasswordHelperInterface $resetPasswordHelper,
            private EntityManagerInterface $entityManager,
        ) {
        }

    /**
         * Confirmation page after a user has requested a password reset.
         */
        #[Route('/check-email', name: 'app_check_email')]
        public function checkEmail(): Response
        {
            // Generate a fake token if the user does not exist or someone hit this page directly.
            // This prevents exposing whether or not a user was found with the given email address or not
            if (null === ($resetToken = $this->getTokenObjectFromSession())) {
                $resetToken = $this->resetPasswordHelper->generateFakeResetToken();
            }

            return $this->render('reset_password/check_email.html.twig', [
                'resetToken' => $resetToken,
            ]);
        }
}
