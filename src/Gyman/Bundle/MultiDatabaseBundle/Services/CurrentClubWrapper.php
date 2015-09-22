<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Services;

use Doctrine\ORM\EntityManager;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\MultiDatabaseBundle\Exception\NoClubsException;
use Gyman\Bundle\UserBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContext;

class CurrentClubWrapper
{
    /**
     * @var Club
     */
    private $club;

    /**
     * @var User
     */
    private $user;

    /**
     * @var EntityManager
     */
    private $defaultEntityManager;

    public function __construct(SecurityContext $context, EntityManager $manager)
    {
        $this->defaultEntityManager = $manager;
        $this->user = $context->getToken()->getUser();
    }

    /**
     * @return Club
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param Club $club
     */
    public function setClub($club)
    {
        $this->club = $club;
        $this->user->setCurrentClub($club);

        $this->defaultEntityManager->persist($this->user);
        $this->defaultEntityManager->flush();
    }

    public function updateCurrentClub(Club $club)
    {
        if ($club === null) {
            $club = $this->user->getClubs()->first();

            if ($club === null) {
                throw new NoClubsException('This user has no clubs');
            }
        }

        $this->setClub($club);

        return $club;
    }
}
