<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Activities extends Subfilter {
    public $name = "activities";
    public $label = "Zajęcia";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $queryBuilder->join("m.entries","e");
        $queryBuilder->join("e.activity","a");
        $queryBuilder->andWhere($queryBuilder->expr()->in('a.id', $this->options["activity"]));
    }
}
