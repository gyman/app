<?php
namespace Gyman\Bundle\AppBundle\Services;

use Dende\MultidatabaseBundle\DTO\Tenant;
use Dende\MultidatabaseBundle\Services\TenantProviderInterface;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;

/**
 * Class TenantProvider
 * @package Gyman\AppBundle\Services
 */
class TenantProvider implements TenantProviderInterface
{
    /**
     * @var Tenant
     */
    private $tenant;

    /**
     * @var ClubRepository
     */
    private $clubRepository;

    /**
     * @var SubdomainProviderInterface
     */
    private $subdomainProvider;

    /**
     * TenantProvider constructor.
     * @param SubdomainProviderInterface $subdomainProvider
     * @param ClubRepository $clubRepository
     */
    public function __construct(SubdomainProviderInterface $subdomainProvider, ClubRepository $clubRepository)
    {
        $this->subdomainProvider = $subdomainProvider;
        $this->clubRepository = $clubRepository;
    }

    /**
     * @return Tenant
     */
    public function getTenant($tenant = null)
    {
        if(is_null($tenant)) {
            $subdomain = $this->subdomainProvider->getSubdomain();
        } else {
            $subdomain = $tenant;
        }

        $club = $this->clubRepository->findOneBySubdomain($subdomain);

        $this->tenant = new Tenant(
            null,
            $club->getDatabase()->getName(),
            $club->getDatabase()->getUsername(),
            $club->getDatabase()->getPassword()
        );

        return $this->tenant;
    }
}