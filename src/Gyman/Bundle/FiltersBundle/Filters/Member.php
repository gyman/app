<?php

namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Member extends AbstractSubfilter
{

    public function apply(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($queryBuilder->expr()->eq('m.id', $this["member"]));
    }
}
