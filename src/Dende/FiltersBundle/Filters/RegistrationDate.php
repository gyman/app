<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class RegistrationDate extends Subfilter {

    public $name = "registrationDate";
    protected $field = "m.created";
    public $label = "Data rejestracji";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $method = $this->options["type"];
        $this->d1 = new \DateTime($this->options["date1"]);
        $this->d2 = new \DateTime($this->options["date2"]);
        $this->$method($queryBuilder);
    }

}
