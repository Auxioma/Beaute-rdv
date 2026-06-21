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
final class ForgotPasswordRequestController extends AbstractController
{
    use ResetPasswordControllerTrait;

        public function __construct(
            private ResetPasswordHelperInterface $resetPasswordHelper,
            private EntityManagerInterface $entityManager,
        ) {
        }

    /**
         * Display & process form to request a password reset.
         */
        #[Route('', name: 'app_forgot_password_request')]
        public function request(Request $request, MailerInterface $mailer, TranslatorInterface $translator): Response
        {
            $form = $this->createForm(ResetPasswordRequestFormType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                /** @var string $email */
                $email = $form->get('email')->getData();

                return $this->processSendingPasswordResetEmail($email, $mailer, $translator
                );
            }

            return $this->render('reset_password/request.html.twig', [
                'requestForm' => $form->createView(),
            ]);
        }

    private function processSendingPasswordResetEmail(string $emailFormData, MailerInterface $mailer, TranslatorInterface $translator): RedirectResponse
        {
            $user = $this->entityManager->getRepository(User::class)->findOneBy([
                'email' => $emailFormData,
            ]);

            // Do not reveal whether a user account was found or not.
            if (!$user) {
                return $this->redirectToRoute('app_check_email');
            }

            try {
                $resetToken = $this->resetPasswordHelper->generateResetToken($user);
            } catch (ResetPasswordExceptionInterface $e) {
                // If you want to tell the user why a reset email was not sent, uncomment
                // the lines below and change the redirect to 'app_forgot_password_request'.
                // Caution: This may reveal if a user is registered or not.
                //
                // $this->addFlash('reset_password_error', sprintf(
                //     '%s - %s',
                //     $translator->trans(ResetPasswordExceptionInterface::MESSAGE_PROBLEM_HANDLE, [], 'ResetPasswordBundle'),
                //     $translator->trans($e->getReason(), [], 'ResetPasswordBundle')
                // ));

                return $this->redirectToRoute('app_check_email');
            }

            $email = (new TemplatedEmail())
                ->from(new Address('hello@rebel-refine.pro', 'Rebel Refine'))
                ->to((string) $user->getEmail())
                ->subject('Your password reset request')
                ->htmlTemplate('reset_password/email.html.twig')
                ->context([
                    'resetToken' => $resetToken,
                ])
            ;

            $mailer->send($email);

            // Store the token object in session for retrieval in check-email route.
            $this->setTokenObjectInSession($resetToken);

            return $this->redirectToRoute('app_check_email');
        }
}
