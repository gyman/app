<?php
namespace Gyman\Bundle\ClubBundle\Services;

use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;

/**
 * Class ClubProvider
 * @package Gyman\Bundle\ClubBundle\Services
 */
class ClubProvider
{
    /**
     * @var SubdomainProviderInterface
     */
    private $subdomainProvider;

    /**
     * @var ClubRepository
     */
    private $clubRepository;

    /**
     * ClubProvider constructor.
     * @param SubdomainProviderInterface $subdomainProvider
     * @param ClubRepository $clubRepository
     */
    public function __construct(SubdomainProviderInterface $subdomainProvider, ClubRepository $clubRepository)
    {
        $this->subdomainProvider = $subdomainProvider;
        $this->clubRepository = $clubRepository;
    }

    /**
     * @return Club|null
     */
    public function getCurrentClub()
    {
        return $this->getClub(
            $this->subdomainProvider->getSubdomain()
        );
    }

    /**
     * @param string $subdomainName
     * @return Club|null
     */
    public function getClub($subdomainName)
    {
        return $this->clubRepository->findOneBySubdomain(new Subdomain($subdomainName));
    }
}
