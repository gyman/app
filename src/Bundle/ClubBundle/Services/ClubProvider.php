<?php

declare(strict_types=1);

namespace Gyman\Bundle\ClubBundle\Services;

use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;

/**
 * Class ClubProvider.
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

    public function club(): ?Club
    {
        if (null === $this->club) {
            $this->club = $this->clubRepository->findOneBySubdomain(
                $this->subdomainProvider->getSubdomain()
            );
        }

        return $this->club;
    }
}
