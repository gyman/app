<?php

namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Price extends AbstractSubfilter
{
    public function apply(QueryBuilder $queryBuilder)
    {
        $method = $this["type"];
        $this->$method($queryBuilder);
    }

    protected function eq(QueryBuilder $qb)
    {
        $qb->andWhere("v.price = :price");
        $qb->setParameter("price", $this["price1"]);
    }

    protected function lt(QueryBuilder $qb)
    {
        $qb->andWhere("v.price < :price");
        $qb->setParameter("price", $this["price1"]);
    }

    protected function gt(QueryBuilder $qb)
    {
        $qb->andWhere("v.price > :price");
        $qb->setParameter("price", $this["price1"]);
    }

    protected function between(QueryBuilder $qb)
    {
        $qb->andWhere("v.price > :price1");
        $qb->andWhere("v.price < :price2");
        $qb->setParameter("price1", $this["price1"]);
        $qb->setParameter("price2", $this["price2"]);
    }
}
