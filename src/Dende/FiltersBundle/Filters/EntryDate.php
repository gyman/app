<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class EntryDate extends Subfilter {

    public $name = "entryDate";
    protected $field = "e.created";
    public $label = "Data wejścia";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $method = $this->options["type"];
        $this->d1 = new \DateTime($this->options["date1"]);
        $this->d2 = new \DateTime($this->options["date2"]);
        $this->$method($queryBuilder);
    }

}
