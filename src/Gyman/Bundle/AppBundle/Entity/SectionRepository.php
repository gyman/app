<?php
namespace Gyman\Bundle\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Class SectionRepository
 * @package Gyman\Bundle\AppBundle\Entity
 */
class SectionRepository extends EntityRepository
{
    /**
     * @param Section $section
     * @return null
     */
    public function insert(Section $section)
    {
        $em = $this->getEntityManager();
        $em->persist($section);
        $em->flush();
    }

    /**
     * @param Section $section
     */
    public function remove(Section $section)
    {
        $em = $this->getEntityManager();
        $em->remove($section);
        $em->flush();
    }

    /**
     * @param $section
     */
    public function update($section)
    {
        $em = $this->getEntityManager();
        $em->persist($section);
        $em->flush();
    }
}
