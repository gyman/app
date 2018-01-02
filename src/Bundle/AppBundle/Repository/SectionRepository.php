<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Gyman\Domain\Section;

/**
 * Class SectionRepository.
 */
class SectionRepository extends EntityRepository
{
    /**
     * @param Section $section
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
