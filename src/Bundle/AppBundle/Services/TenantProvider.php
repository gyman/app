<?php
namespace Gyman\Bundle\AppBundle\Services;

use Dende\MultitenancyBundle\DTO\Tenant;
use Dende\MultitenancyBundle\Provider\TenantProviderInterface;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;

/**
 * Class TenantProvider
 * @package Gyman\Bundle\AppBundle\Services
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
     * @param SubdomainProviderInterface $subdomainProvider
     * @param ClubRepository $clubRepository
     */
    public function __construct(SubdomainProviderInterface $subdomainProvider, ClubRepository $clubRepository, $host = 'localhost')
    {
        $this->subdomainProvider = $subdomainProvider;
        $this->clubRepository = $clubRepository;
        $this->host = $host;
    }

    /**
     * @return Tenant|null
     */
    public function getTenant($subdomain = null)
    {
        if ($subdomain === null && $this->tenantId === null) {
            $this->tenantId = $this->subdomainProvider->getSubdomain();
        }

        $club = $this->clubRepository->findOneBySubdomain($this->tenantId);

        if(is_null($club))
        {
            return;
        }

        return Tenant::fromArray([
            'dbname' => $club->getDatabase()->getName(),
            'username' => $club->getDatabase()->getUsername(),
            'password' => $club->getDatabase()->getPassword(),
            'host' => $this->host,
            'path' => null,
        ]);
    }

    /**
     * @param $id
     */
    public function setTenantId($id) {
        $this->tenantId = $id;
    }
}
