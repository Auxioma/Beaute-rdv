<?php

namespace App\Controller\Auth;

use App\Entity\Auth\User;
use App\Form\Model\RegisterUserData;
use App\Form\RegisterUserFormType;
use App\Repository\Auth\UserRepository;
use App\Security\EmailVerifier;
use App\Service\RegistrationManager;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Attribute\Route;

final class RegisterUserController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/register', name: 'app_register_user', methods: ['GET', 'POST'])]
    public function registerUser(
        Request $request,
        UserRepository $userRepository,
        RegistrationManager $registrationManager,
        EmailVerifier $emailVerifier,
    ): Response {
        $form = $this->createForm(RegisterUserFormType::class, new RegisterUserData());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var RegisterUserData $data */
            $data = $form->getData();
            $normalizedEmail = strtolower(trim((string) $data->email));
            $existingUser = $userRepository->findOneBy(['email' => $normalizedEmail]);

            if ($existingUser instanceof User) {
                if (!$existingUser->isVerified()) {
                    $emailVerifier->sendEmailConfirmation(
                        'app_verify_email',
                        $existingUser,
                        (new TemplatedEmail())
                            ->from(new Address('hello@rebel-refine.pro', 'Belle Maison'))
                            ->to((string) $existingUser->getEmail())
                            ->subject('Validez votre adresse email')
                            ->htmlTemplate('emails/verify_email.html.twig')
                            ->context([
                                'user' => $existingUser,
                            ])
                    );

                    $this->addFlash('success', 'Un nouvel email de validation vient d’être envoyé.');

                    return $this->redirectToRoute('app_login_user', [
                        '_locale' => $request->getLocale(),
                    ]);
                }

                $form->get('email')->addError(new FormError('Cette adresse email est déjà utilisée.'));
            } else {
                $user = $registrationManager->registerClient($data, (string) $request->getLocale());

                $emailVerifier->sendEmailConfirmation(
                    'app_verify_email',
                    $user,
                    (new TemplatedEmail())
                        ->from(new Address('hello@rebel-refine.pro', 'Belle Maison'))
                        ->to((string) $user->getEmail())
                        ->subject('Validez votre adresse email')
                        ->htmlTemplate('emails/verify_email.html.twig')
                        ->context([
                            'user' => $user,
                        ])
                );

                $this->addFlash('success', 'Votre compte client a bien été créé. Vérifiez maintenant votre email pour l’activer.');

                return $this->redirectToRoute('app_login_user', [
                    '_locale' => $request->getLocale(),
                ]);
            }
        }

        return $this->render('auth/register_user.html.twig', [
            'page_title' => 'Créer un compte client — Belle Maison',
            'registrationForm' => $form->createView(),
        ]);
    }
}
