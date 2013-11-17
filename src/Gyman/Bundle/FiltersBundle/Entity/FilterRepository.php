<?php

namespace Gyman\Bundle\FiltersBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class FilterRepository extends EntityRepository
{

    /**
     * @codeCoverageIgnore
     * @return type
     */
    public function getPinnedFilters()
    {
        $query = $this->getPinnedFiltersQueryBuilder();

        return $query->getQuery()->execute();
    }

    /**
     * @return QueryBuilder
     */
    public function getPinnedFiltersQueryBuilder()
    {
        return $this->createQueryBuilder("f")
                ->where("f.pinned = true");
    }

    /**
     * @codeCoverageIgnore
     */
    public function getFilters()
    {
        return $this->getFiltersQueryBuilder()
                ->getQuery()
                ->execute();
    }

    /**
     * @return QueryBuilder
     */
    public function getFiltersQueryBuilder()
    {
        return $this->createQueryBuilder("f");
    }

    /**
     * @codeCoverageIgnore
     * @param  type $listname
     * @return type
     */
    public function getFiltersByListname($listname)
    {
        return $this->getFiltersByListnameQueryBuilder($listname)
                ->getQuery()
                ->execute();
    }

    /**
     * @return QueryBuilder
     */
    public function getFiltersByListnameQueryBuilder($listname)
    {
        return $this->createQueryBuilder("f")
                ->andWhere("f.listname = :listname")
                ->setParameter("listname", $listname);
    }
}
