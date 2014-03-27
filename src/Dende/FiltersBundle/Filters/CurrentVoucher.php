<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class CurrentVoucher extends Subfilter {

    public $name = "currentVoucher";
    public $label = "Aktualny karnet";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $hasVoucher = (bool) $this->options["currentVoucher"];
        if ($hasVoucher)
        {
            $queryBuilder->andWhere("m.currentVoucher is not null");
        }
        else
        {
            $queryBuilder->andWhere("m.currentVoucher is null");
        }
    }

}
