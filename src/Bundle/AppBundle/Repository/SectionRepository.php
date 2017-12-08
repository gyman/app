<?php
namespace Gyman\Bundle\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Gyman\Domain\Section;

/**
 * Class SectionRepository
 * @package Gyman\Bundle\AppBundle\Repository
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
        $em->flush($section);
    }

    /**
     * @param Section $section
     */
    public function remove(Section $section)
    {
        $em = $this->getEntityManager();
        $em->remove($section);
        $em->flush($section);
    }

    /**
     * @param $section
     */
    public function update($section)
    {
        $em = $this->getEntityManager();
        $em->persist($section);
        $em->flush($section);
    }
}
