<?php

declare(strict_types=1);

namespace Gyman\Bundle\ClubBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class ClubRepository.
 */
class ClubRepository extends EntityRepository
{
    /**
     * @param string $subdomain
     *
     * @return null|Club
     */
    public function findOneBySubdomain($subdomain)
    {
        return $this->findOneBy(['subdomain.name' => $subdomain]);
    }

    public function update(Club $club)
    {
        $em = $this->getEntityManager();
        $em->persist($club);
        $em->flush();
    }

    /**
     * @param Club $club
     */
    public function save(Club $club)
    {
        $em = $this->getEntityManager();
        $em->persist($club);
        $em->flush($club);
    }
}
