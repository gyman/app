<?php
namespace Gyman\Bundle\AppBundle\Entity;

use DateTime;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Gyman\Domain\Model\Section;
use Gyman\Domain\Repository\VoucherRepositoryInterface;

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
}