<?php

namespace App\Twig;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class LocalePathExtension extends AbstractExtension
{
    public function __construct(
        private readonly RouterInterface $router,
        private readonly RequestStack $requestStack,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('locale_path', $this->generatePath(...)),
        ];
    }

    /**
     * Mirrors Twig's built-in path() helper while preserving the current locale
     * for routes that explicitly declare an _locale parameter.
     *
     * @param array<string, mixed> $parameters
     */
    public function generatePath(string $name, array $parameters = [], bool $relative = false): string
    {
        $route = $this->router->getRouteCollection()->get($name);

        if (
            null !== $route
            && str_contains($route->getPath(), '{_locale')
            && !\array_key_exists('_locale', $parameters)
        ) {
            $request = $this->requestStack->getMainRequest();
            $locale = $request?->attributes->get('_locale')
                ?? $request?->getLocale()
                ?? $this->router->getContext()->getParameter('_locale');

            if (\is_string($locale) && '' !== $locale) {
                $parameters['_locale'] = $locale;
            }
        }

        return $this->router->generate(
            $name,
            $parameters,
            $relative ? UrlGeneratorInterface::RELATIVE_PATH : UrlGeneratorInterface::ABSOLUTE_PATH,
        );
    }
}
