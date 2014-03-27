<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Starred extends Subfilter {

    public $name = "starred";
    public $label = "Oznaczony gwiazdką";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $starred = $this->options["starred"] == 1 ? true : false;

        if ($starred)
        {
            $queryBuilder->andWhere("m.starred = true");
        }
        else
        {
            $queryBuilder->andWhere("m.starred is null or m.starred = false");
        }
    }

}
