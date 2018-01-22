<?php
namespace Gyman\Bundle\AppBundle\Services;

use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class SubdomainProvider
 * @package Gyman\Bundle\AppBundle\Services
 * @todo should return Subdomain object not a string
 */
final class SubdomainProvider implements SubdomainProviderInterface
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var array
     */
    private $whiteList = [
        "admin"
    ];

    public function __construct(RequestStack $requestStack, $baseUrl)
    {
        $this->requestStack = $requestStack;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return Subdomain|null
     */
    public function getSubdomain() : ?Subdomain
    {
        $request = $this->requestStack->getCurrentRequest();

        if ($request === null) {
            return null;
        }

        $currentHost = $request->getHttpHost();

        if ($currentHost === 'localhost') {
            return null;
        }

        $subdomain = str_replace('.' . $this->baseUrl, '', $currentHost);

        if(in_array($subdomain, $this->whiteList))
        {
            return null;
        }

        if($subdomain === $currentHost)
        {
            return null;
        }

        return new Subdomain($subdomain);
    }
}
