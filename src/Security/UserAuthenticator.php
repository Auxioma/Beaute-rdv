<?php

namespace App\Security;

use App\Entity\Auth\User;
use App\Repository\Auth\UserRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

final class UserAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    private const LOGIN_ROUTE_SESSION_KEY = '_security.login_route';

    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
        private readonly UserRepository $userRepository,
    ) {
    }

    public function supports(Request $request): bool
    {
        return $request->isMethod('POST') && \in_array($request->attributes->get('_route'), ['app_login_user', 'app_login_pro'], true);
    }

    public function authenticate(Request $request): Passport
    {
        $email = strtolower(trim($request->request->getString('email')));

        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $email);
        $request->getSession()->set(self::LOGIN_ROUTE_SESSION_KEY, $this->resolveLoginRoute($request));

        return new Passport(
            new UserBadge($email, fn (string $userIdentifier): ?User => $this->userRepository->findOneBy(['email' => $userIdentifier])),
            new PasswordCredentials($request->request->getString('password')),
            [
                new CsrfTokenBadge('authenticate', $request->request->getString('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        $user = $token->getUser();
        $locale = $request->getLocale();

        if ($user instanceof User && $user->getType() === User::TYPE_PRO) {
            return new RedirectResponse($this->urlGenerator->generate('app_dashboard_pro', [
                '_locale' => $locale,
            ]));
        }

        return new RedirectResponse($this->urlGenerator->generate('app_account_user', [
            '_locale' => $locale,
        ]));
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate($this->resolveLoginRoute($request), [
            '_locale' => $request->getLocale(),
        ]);
    }

    private function resolveLoginRoute(Request $request): string
    {
        $route = $request->attributes->get('_route');

        if (\is_string($route) && \in_array($route, ['app_login_user', 'app_login_pro'], true)) {
            return $route;
        }

        $sessionRoute = $request->hasSession() ? $request->getSession()->get(self::LOGIN_ROUTE_SESSION_KEY) : null;

        if (\is_string($sessionRoute) && \in_array($sessionRoute, ['app_login_user', 'app_login_pro'], true)) {
            return $sessionRoute;
        }

        return str_contains($request->getPathInfo(), '/professionals/') ? 'app_login_pro' : 'app_login_user';
    }
}
