<?php
namespace Gyman\Bundle\ClubBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class ClubRepository
 * @package Gyman\Bundle\ClubBundle
 */
class ClubRepository extends EntityRepository
{
    /**
     * @param string $subdomain
     * @return null|Club
     */
    public function findOneBySubdomain(Subdomain $subdomain)
    {
        return $this->findOneBy(['subdomain.name' => $subdomain->getName()]);
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
