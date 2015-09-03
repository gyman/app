<?php
namespace Gyman\Bundle\ClubBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class ClubRepository
 * @package Gyman\Bundle\ClubBundle
 */
final class ClubRepository extends EntityRepository
{
    /**
     * @param Subdomain $subdomain
     * @return null|Club
     */
    public function findOneBySubdomain(Subdomain $subdomain)
    {
        return $this->findOneBy(['subdomain.name' => $subdomain->getName()]);
    }
}
