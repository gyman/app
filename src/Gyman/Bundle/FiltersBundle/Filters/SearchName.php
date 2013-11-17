<?php

namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class SearchName extends AbstractSubfilter
{

    public function apply(QueryBuilder $queryBuilder)
    {
        $string = $this["search"];

        $queryBuilder->andWhere($queryBuilder->expr()->orX(
            $queryBuilder->expr()->like('m.name', ':string'), $queryBuilder->expr()->like('m.notes', ':string')
        ));

        $queryBuilder->setParameter("string", "%" . $string . "%");
    }
}
