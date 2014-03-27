<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Search extends Subfilter {

    public $name = "search";
    public $label = "Szukaj tekstu";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $string = $this->options["search"];

        $queryBuilder->andWhere($queryBuilder->expr()->orX(
                        $queryBuilder->expr()->like('m.name', ':string'), $queryBuilder->expr()->like('m.notes', ':string')
        ));

        $queryBuilder->setParameter("string", "%" . $string . "%");
    }

}
