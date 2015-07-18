<?php

namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;
use Gyman\Bundle\ScheduleBundle\Entity\Activity;

class Activities extends AbstractSubfilter
{
    /**
     * Filters parameter
     */
    public function apply(QueryBuilder $queryBuilder)
    {
        if (count($this["activities"]) == 0) {
            return;
        }

        $activities = $this["activities"]->toArray();

        $queryBuilder->andWhere(
            $queryBuilder->expr()->in(
                'a.id',
                array_map(function (Activity $item) {
                    return $item->getId();
                }, $activities)
            )
        );
    }
}
