<?php

namespace App\Controller\Auth;

use App\Entity\Auth\User;
use App\Form\ResetPasswordRequestFormType;
use App\Repository\Auth\UserRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use SymfonyCasts\Bundle\ResetPassword\Controller\ResetPasswordControllerTrait;
use SymfonyCasts\Bundle\ResetPassword\Exception\ResetPasswordExceptionInterface;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;

final class ForgotPasswordUserController extends AbstractController
{
    use ResetPasswordControllerTrait;

    public function __construct(
        private readonly ResetPasswordHelperInterface $resetPasswordHelper,
        private readonly UserRepository $userRepository,
    ) {
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/password/forgot', name: 'app_forgot_password_user', methods: ['GET', 'POST'])]
    public function forgotPasswordUser(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $email */
            $email = $form->get('email')->getData();

            return $this->processSendingPasswordResetEmail($email, (string) $request->getLocale(), $mailer);
        }

        return $this->render('auth/forgot_password_user.html.twig', [
            'page_title' => 'Mot de passe oublié — Belle Maison',
            'requestForm' => $form->createView(),
        ]);
    }

    private function processSendingPasswordResetEmail(string $emailFormData, string $locale, MailerInterface $mailer): RedirectResponse
    {
        $user = $this->userRepository->findOneBy([
            'email' => strtolower(trim($emailFormData)),
        ]);

        if (!$user instanceof User || $user->getType() !== User::TYPE_CLIENT) {
            return $this->redirectToRoute('app_check_email_user', [
                '_locale' => $locale,
            ]);
        }

        try {
            $resetToken = $this->resetPasswordHelper->generateResetToken($user);
        } catch (ResetPasswordExceptionInterface) {
            return $this->redirectToRoute('app_check_email_user', [
                '_locale' => $locale,
            ]);
        }

        $resetUrl = $this->generateUrl('app_reset_password_user', [
            '_locale' => $user->getLocale(),
            'token' => $resetToken->getToken(),
        ], UrlGeneratorInterface::ABSOLUTE_URL);

        $mailer->send(
            (new TemplatedEmail())
                ->from(new Address('hello@rebel-refine.pro', 'Belle Maison'))
                ->to((string) $user->getEmail())
                ->subject('Réinitialisez votre mot de passe')
                ->htmlTemplate('emails/reset_password_user.html.twig')
                ->context([
                    'user' => $user,
                    'resetToken' => $resetToken,
                    'resetUrl' => $resetUrl,
                ])
        );

        $this->setTokenObjectInSession($resetToken);

        return $this->redirectToRoute('app_check_email_user', [
            '_locale' => $user->getLocale(),
        ]);
    }
}
