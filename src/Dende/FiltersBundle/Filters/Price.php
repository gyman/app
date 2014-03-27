<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Price extends Subfilter {

    public $name = "price";
    public $label = "Cena";
    protected $field = "v.price";

    public function applyToQuery(QueryBuilder $queryBuilder) {
        $method = $this->options["type"];
        $this->price1 = floatval($this->options["price1"]);
        $this->price2 = floatval($this->options["price2"]);
        $this->$method($queryBuilder);
    }

    protected function eq(QueryBuilder $qb) {
        $qb->andWhere($this->field . " = :price");
        $qb->setParameter("price", $this->price1);
    }

    protected function lt(QueryBuilder $qb) {
        $qb->andWhere($this->field . " < :price");
        $qb->setParameter("price", $this->price1);
    }

    protected function gt(QueryBuilder $qb) {
        $qb->andWhere($this->field . " > :price");
        $qb->setParameter("price", $this->price1);
    }

    protected function between(QueryBuilder $qb) {
        $qb->andWhere($this->field . " > :price1");
        $qb->andWhere($this->field . " < :price2");
        $qb->setParameter("price1", $this->price1);
        $qb->setParameter("price2", $this->price2);
    }

}
