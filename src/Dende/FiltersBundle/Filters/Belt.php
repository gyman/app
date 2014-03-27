<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class Belt extends Subfilter {

    public $name = "belt";
    private $belts = array(
        "white",
        "blue",
        "purple",
        "brown",
        "black"
    );
    private $beltIndex;
    public $label = "Kolor pasa";

    private $field = "m.belt";
    
    public function applyToQuery(QueryBuilder $queryBuilder) {
        $belt = $this->options["belt"];
        $method = $this->options["type"];

        $this->beltIndex = array_search($belt, $this->belts);
        $this->$method($queryBuilder);
    }

    protected function lt(QueryBuilder $queryBuilder) {
        $lowerThanBelts = array_slice($this->belts, $this->beltIndex);
        $queryBuilder->andWhere($queryBuilder->expr()->orX(
                        $queryBuilder->expr()->notIn($this->field, $lowerThanBelts), $queryBuilder->expr()->isNull($this->field)
                )
        );
    }

    protected function gt(QueryBuilder $queryBuilder) {
        $greaterThanBelts = array_slice($this->belts, 0, $this->beltIndex + 1);
        $queryBuilder->andWhere($queryBuilder->expr()->notIn($this->field, $greaterThanBelts));
        $queryBuilder->andWhere($this->field ." is not null");
    }

    protected function eq(QueryBuilder $queryBuilder) {
        $queryBuilder->setParameter("belt", $this->options["belt"]);

        if ($this->options["belt"] == "white")
        {
            $queryBuilder->andWhere($queryBuilder->expr()->orX(
                            $queryBuilder->expr()->eq($this->field, ":belt"), $queryBuilder->expr()->isNull($this->field)
                    )
            );
        }
        else
        {
            $queryBuilder->andWhere($this->field ." = :belt");
        }
    }

    protected function not(QueryBuilder $queryBuilder) {
        $queryBuilder->setParameter("belt", $this->options["belt"]);
        $exp = $queryBuilder->expr();

        if ($this->options["belt"] == "white")
        {
            $queryBuilder->andWhere($exp->not($exp->eq($this->field, ":belt")));
            $queryBuilder->andWhere($exp->isNotNull($this->field));
        }
        else
        {
            $queryBuilder->andWhere($this->field ." != :belt");
        }
    }

}
