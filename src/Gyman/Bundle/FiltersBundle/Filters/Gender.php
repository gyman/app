<?php

namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Gender extends AbstractSubfilter
{
    public function apply(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere("m.gender = :gender");
        $queryBuilder->setParameter("gender", $this["gender"]);
    }
}
