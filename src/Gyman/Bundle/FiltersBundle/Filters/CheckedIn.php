<?php

namespace Gyman\Bundle\FiltersBundle\Filters;

use DateTime;
use Doctrine\ORM\QueryBuilder;

class CheckedIn extends AbstractSubfilter
{
    public function apply(QueryBuilder $queryBuilder)
    {
        $checkedIn = (bool) $this['checkedIn'];
        if ($checkedIn) {
            $queryBuilder->andWhere('m.lastEntry is not null and (m.lastEntry.endDate is null or m.lastEntry.endDate < :now)');
            $queryBuilder->setParameter('now', new DateTime());
        } else {
            $queryBuilder->andWhere('m.lastEntry is null');
        }
    }
}
