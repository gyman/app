<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class CheckedIn extends Subfilter {

    public $name = "checkedIn";
    public $label = "Znajduje się w klubie";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $checkedIn = (bool) $this->options["checkedIn"];
        if ($checkedIn)
        {
            $queryBuilder->andWhere("m.lastEntry is not null");
        }
        else
        {
            $queryBuilder->andWhere("m.lastEntry is null");
        }
    }

}
