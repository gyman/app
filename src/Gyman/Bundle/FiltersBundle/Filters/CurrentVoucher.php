<?php

namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class CurrentVoucher extends AbstractSubfilter
{

    public function apply(QueryBuilder $queryBuilder)
    {
        $hasVoucher = (bool) $this["currentVoucher"];

        if ($hasVoucher) {
            $queryBuilder->andWhere("m.currentVoucher is not null");
        } else {
            $queryBuilder->andWhere("m.currentVoucher is null");
        }
    }
}
