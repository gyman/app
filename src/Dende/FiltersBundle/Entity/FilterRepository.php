<?php

namespace Dende\FiltersBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Dende\FiltersBundle\Entity\Filter;
use Doctrine\Common\Collections\ArrayCollection;

class FilterRepository extends EntityRepository {

    public function getPinnedFilters() {
        return $this->createQueryBuilder("f")
                ->where("f.pinned = true")
                ->getQuery()
                ->execute();
    }

    public function getFilters() {
        return $this->createQueryBuilder("f")
                ->getQuery()
                ->execute();
    }
    public function getFiltersByListname($listname) {
        return $this->createQueryBuilder("f")
                ->andWhere("f.listname = :listname")
                ->setParameter("listname", $listname)
                ->getQuery()
                ->execute();
    }

}
