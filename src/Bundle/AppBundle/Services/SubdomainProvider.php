<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Services;

use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class SubdomainProvider.
 *
 * @todo should return Subdomain object not a string
 */
final class SubdomainProvider implements SubdomainProviderInterface
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var
     */
    private $baseUrl;

    /**
     * SubdomainProvider constructor.
     *
     * @param RequestStack $requestStack
     * @param $baseUrl
     */
    public function __construct(RequestStack $requestStack, $baseUrl)
    {
        $this->requestStack = $requestStack;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string|null
     */
    public function getSubdomain(): ?string
    {
        $request = $this->requestStack->getCurrentRequest();

        if (null === $request) {
            return null;
        }

        $currentHost = $request->getHttpHost();

        if ('localhost' === $currentHost) {
            return null;
        }

        $subdomain = str_replace('.' . $this->baseUrl, '', $currentHost);

        if ($subdomain === $currentHost) {
            return null;
        }

        return $subdomain;
    }
}
