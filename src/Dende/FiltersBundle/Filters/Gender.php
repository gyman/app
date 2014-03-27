<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Gender extends Subfilter {

    public $name = "gender";
    public $label = "Płeć";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $gender = $this->options["gender"];
        $queryBuilder->andWhere("m.gender = :gender");
        $queryBuilder->setParameter("gender", $gender);
    }

}
