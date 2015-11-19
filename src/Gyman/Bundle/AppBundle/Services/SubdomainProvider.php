<?php
namespace Gyman\Bundle\AppBundle\Services;

use Symfony\Bundle\FrameworkBundle\Tests\Functional\app\AppKernel;
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
     * @var
     */
    private $baseUrl;

    /**
     * SubdomainProvider constructor.
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
    public function getSubdomain()
    {
        $currentHost = $this->requestStack->getCurrentRequest()->getHttpHost();

        if ($currentHost === 'localhost') {
            return;
        }

        $subdomain = str_replace('.' . $this->baseUrl, '', $currentHost);

        return $subdomain;
    }
}
