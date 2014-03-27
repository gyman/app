<?php

namespace Dende\ListsBundle\Services;

use Dende\ListsBundle\Services\AbstractList;
use Doctrine\ORM\QueryBuilder;

class VouchersList extends AbstractList {

    protected $listname = "vouchers";
    protected $listTrPartial = "ListsBundle:Vouchers:_list_tr.html.twig";
    protected $columnsCount = 6;
    protected $sortingColumns = array(
        0 => "m.name",
        1 => "v.startDate",
        2 => "v.amount",
        3 => "v.created",
        4 => "priceL",
    );

    protected function addJoins(QueryBuilder $query) {
        $query->innerJoin("v.member", "m");
        $query->leftJoin("v.entries", "e");
    }

    public function getSortingFunction($sortingColumnsCount, $sortingColumnArray, $sortingOrderArray) {

        /**
         * @var Closure
         */
        return function(QueryBuilder $query) use ($sortingColumnsCount, $sortingColumnArray, $sortingOrderArray) {
            if ($sortingColumnsCount == 0)
            {
                return;
            }

            for ($a = 0; $a < $sortingColumnsCount; $a++) {
                $column = (int) $sortingColumnArray[$a];
                $order = strtoupper($sortingOrderArray[$a]);

                if (!key_exists($column, $this->sortingColumns))
                {
                    continue;
                }

                $columnName = $this->sortingColumns[$column];


                if ($column == 4)
                {
                    $select = "LENGTH(v.price) as HIDDEN priceL";
                    $query->addSelect($select);
                    $query->addOrderBy("priceL", $order);
                    $query->addOrderBy("v.price", $order);
                    continue;
                }

                if ($a == 0)
                {
                    $query->orderBy($columnName, $order);
                }
                else
                {
                    $query->addOrderBy($columnName, $order);
                }
            }
        };
    }

}
