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
    /** @var SubdomainProviderInterface */
    private $subdomainProvider;

    /** @var ClubRepository */
    private $clubRepository;

    /** @var Club */
    private $club;

    public function __construct(SubdomainProviderInterface $subdomainProvider, ClubRepository $clubRepository)
    {
        $this->subdomainProvider = $subdomainProvider;
        $this->clubRepository = $clubRepository;
    }

    public function club() : ?Club
    {
        $subdomain = $this->subdomainProvider->getSubdomain();

        if($subdomain !== null && $this->club === null) {
            $this->club = $this->clubRepository->findOneBySubdomain($subdomain);
        }

        return $this->club;
    }
}
