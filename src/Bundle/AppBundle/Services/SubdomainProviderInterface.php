<?php
namespace Gyman\Bundle\AppBundle\Services;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;

/**
 * Interface SubdomainProviderInterface
 * @package Gyman\Bundle\AppBundle\Services
 */
interface SubdomainProviderInterface
{
    /**
     * @return Subdomain
     */
    public function getSubdomain() : ?Subdomain;
}
