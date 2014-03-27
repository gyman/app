<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Age extends Subfilter {

    public $name = "age";
    public $label = "Wiek";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $method = $this->options["type"];
        $this->$method($queryBuilder);
    }

    protected function between(QueryBuilder $qb) {
        $x = new \DateTime($this->options["age2"] . " years ago");
        $y = new \DateTime($this->options["age1"] . " years ago");

        $qb->andWhere("m.birthdate >= :" . $this->prep("dateFrom"));
        $qb->andWhere("m.birthdate <= :" . $this->prep("dateTo"));
        $qb->setParameter($this->prep("dateFrom"), $x->format($this->format));
        $qb->setParameter($this->prep("dateTo"), $y->format($this->format));
    }

    protected function gt(QueryBuilder $queryBuilder) {
        $x = new \DateTime($this->options["age1"] . " years ago");

        $queryBuilder->andWhere("m.birthdate <= :" . $this->prep("dateTo"));
        $queryBuilder->setParameter($this->prep("dateTo"), $x->format($this->format));
    }

    protected function lt(QueryBuilder $queryBuilder) {
        $x = new \DateTime($this->options["age1"] . " years ago");

        $queryBuilder->andWhere("m.birthdate >= :" . $this->prep("dateFrom"));
        $queryBuilder->setParameter($this->prep("dateFrom"), $x->format($this->format));
    }

}
