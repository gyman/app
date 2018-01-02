<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Services;

use Dende\MultitenancyBundle\DTO\Tenant;
use Dende\MultitenancyBundle\Provider\TenantProviderInterface;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;

/**
 * Class TenantProvider.
 */
class TenantProvider implements TenantProviderInterface
{
    /**
     * @var string
     */
    protected $host;
    /**
     * @var ClubRepository
     */
    private $clubRepository;

    /**
     * @var SubdomainProviderInterface
     */
    private $subdomainProvider;

    /**
     * @var string
     */
    private $tenantId;

    /**
     * TenantProvider constructor.
     *
     * @param SubdomainProviderInterface $subdomainProvider
     * @param ClubRepository             $clubRepository
     * @param mixed                      $host
     */
    public function __construct(SubdomainProviderInterface $subdomainProvider, ClubRepository $clubRepository, $host = 'localhost')
    {
        $this->subdomainProvider = $subdomainProvider;
        $this->clubRepository = $clubRepository;
        $this->host = $host;
    }

    /**
     * @param null|mixed $subdomain
     *
     * @return Tenant|null
     */
    public function getTenant($subdomain = null)
    {
        if (null === $subdomain && null === $this->tenantId) {
            $this->tenantId = $this->subdomainProvider->getSubdomain();
        }

        $club = $this->clubRepository->findOneBySubdomain($this->tenantId);

        if (null === $club) {
            return;
        }

        return Tenant::fromArray([
            'dbname'   => $club->getDatabase()->getName(),
            'username' => $club->getDatabase()->getUsername(),
            'password' => $club->getDatabase()->getPassword(),
            'host'     => $this->host,
            'path'     => null,
        ]);
    }

    /**
     * @param $id
     */
    public function setTenantId($id)
    {
        $this->tenantId = $id;
    }
}
