<?php
namespace Gyman\Bundle\AppBundle\Services;

use Gyman\Bundle\ClubBundle\Entity\Subdomain;

final class TestSubdomainProvider implements SubdomainProviderInterface
{
    public function getSubdomain() : ?Subdomain
    {
        return new Subdomain('dende');
    }
}
