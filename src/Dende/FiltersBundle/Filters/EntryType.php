<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class EntryType extends Subfilter {

    public $name = "entryType";
    public $label = "Płatność za wejście";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $method = $this->options["type"];
        $queryBuilder->setParameter("entryType", $this->options["entryType"]);
        $this->$method($queryBuilder);
    }

    protected function eq(QueryBuilder $queryBuilder) {
        $queryBuilder->andWhere("e.entryType = :entryType");
    }

    protected function not(QueryBuilder $queryBuilder) {
        $queryBuilder->andWhere("e.entryType != :entryType");
    }

}
