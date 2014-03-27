<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Member extends Subfilter {
    public $name = "member";
    public $label = "Uczestnik";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $queryBuilder->andWhere($queryBuilder->expr()->eq('m.id', $this->options["member"]));
    }
}
