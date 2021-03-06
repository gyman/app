<?php
namespace Gyman\Bundle\AppBundle\EntityManager;

use FOS\UserBundle\Doctrine\UserManager as BaseUserManager;
use Gyman\Bundle\AppBundle\Services\SubdomainProvider;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Gyman\Domain\User;

/**
 * Class UserManager
 * @package Gyman\Bundle\ClubBundle\Entity
 */
class UserManager extends BaseUserManager
{
    /**
     * @var SubdomainProvider
     */
    private $subdomainProvider;

    /**
     * @var ClubRepository
     */
    private $clubRepository;

    /**
     * @param ClubRepository $clubRepository
     */
    public function setClubRepository($clubRepository)
    {
        $this->clubRepository = $clubRepository;
    }

    /**
     * @param SubdomainProvider $subdomainProvider
     */
    public function setSubdomainProvider($subdomainProvider)
    {
        $this->subdomainProvider = $subdomainProvider;
    }

    /**
     * {@inheritDoc}
     */
    public function __findUserBy(array $criteria)
    {
        $subdomainName = $this->subdomainProvider->getSubdomain();

        /** @var Club $club */
        $club = $this->clubRepository->findOneBySubdomain(new Subdomain($subdomainName));

        /** @var User $user */
        $user = parent::findUserBy($criteria);

        return $club->getOwners()->contains($user) ? $user : null;
    }
}
