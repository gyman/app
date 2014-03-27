<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class VoucherEnd extends Subfilter {

    public $name = "voucherEnd";
    protected $field = "v.endDate";
    public $label = "Karnet - data zakończenia";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $method = $this->options["type"];
        $this->d1 = new \DateTime($this->options["date1"]);
        $this->d2 = new \DateTime($this->options["date2"]);
        $this->$method($queryBuilder);
    }

}
