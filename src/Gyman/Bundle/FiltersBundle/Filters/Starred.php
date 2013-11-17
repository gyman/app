<?php

namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Starred extends AbstractSubfilter
{

    public function apply(QueryBuilder $queryBuilder)
    {
        $starred = $this["starred"] == 1 ? true : false;

        if ($starred) {
            $queryBuilder->andWhere("m.starred = true");
        } else {
            $queryBuilder->andWhere("m.starred is null or m.starred = false");
        }
    }
}
