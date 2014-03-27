<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class VoucherStart extends Subfilter {

    public $name = "voucherStart";
    public $label = "Karnet - data rozpoczęcia";
    protected $field = "v.startDate";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $method = $this->options["type"];
        $this->d1 = new \DateTime($this->options["date1"]);
        $this->d2 = new \DateTime($this->options["date2"]);
        $this->$method($queryBuilder);
    }

}
