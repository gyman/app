<?php
namespace Gyman\Bundle\AppBundle\Repository;

use DateTime;
use Doctrine\Common\Collections\Collection;
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

    public function delete(Section $section)
    {
        $em = $this->getEntityManager();
        $section->setDeletedAt(new DateTime("now"));
        $em->flush($section);
    }

    public function findAll() : array
    {
        $qb = $this->createQueryBuilder('s');
        $qb->where("s.deletedAt is null");
        $qb->orderBy("s.createdAt", "ASC");

        return $qb->getQuery()->execute();
    }
}
