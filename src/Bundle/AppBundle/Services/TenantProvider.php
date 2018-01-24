<?php
namespace Gyman\Bundle\AppBundle\Services;

use Dende\MultitenancyBundle\DTO\Tenant;
use Dende\MultitenancyBundle\Provider\TenantProviderInterface;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;

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

    public function __construct(SubdomainProviderInterface $subdomainProvider, ClubRepository $clubRepository, $host = 'localhost')
    {
        $this->subdomainProvider = $subdomainProvider;
        $this->clubRepository = $clubRepository;
        $this->host = $host;
    }

    public function getTenant(string $subdomain = null) : ?Tenant
    {
        if ($subdomain === null && $this->tenantId === null) {
            $this->tenantId = $this->subdomainProvider->getSubdomain()->name();
        }

        $club = $this->clubRepository->findOneBySubdomain(new Subdomain($this->tenantId));

        if(is_null($club))
        {
            return null;
        }

        $database = $club->database();

        return Tenant::fromArray([
            'dbname' => $database->dbname(),
            'username' => $database->username(),
            'password' => $database->password(),
            'host' => $this->host,
            'path' => null,
        ]);
    }

    public function setTenantId(string $id) : void {
        $this->tenantId = $id;
    }
}
