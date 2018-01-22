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

    public function setTenantId($id) {
        $this->tenantId = $id;
    }
}
