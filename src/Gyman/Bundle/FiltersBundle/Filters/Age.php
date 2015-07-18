<?php

namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;
use \DateTime;

class Age extends AbstractSubfilter
{
    public function apply(QueryBuilder $queryBuilder)
    {
        $this->call($this["type"], $queryBuilder);
    }

    protected function between(QueryBuilder $qb)
    {
        $dateFrom = new DateTime($this["age2"] . " years ago");
        $dateTo = new DateTime($this["age1"] . " years ago");

        $qb->andWhere("m.birthdate >= :dateFrom");
        $qb->andWhere("m.birthdate <= :dateTo");
        $qb->setParameter("dateFrom", $dateFrom->format($this->format));
        $qb->setParameter("dateTo", $dateTo->format($this->format));
    }

    protected function gt(QueryBuilder $queryBuilder)
    {
        $x = new DateTime($this["age1"] . " years ago");

        $queryBuilder->andWhere("m.birthdate <= :dateTo");
        $queryBuilder->setParameter("dateTo", $x->format($this->format));
    }

    protected function lt(QueryBuilder $queryBuilder)
    {
        $x = new DateTime($this["age1"] . " years ago");

        $queryBuilder->andWhere("m.birthdate >= :dateFrom");
        $queryBuilder->setParameter("dateFrom", $x->format($this->format));
    }
}
