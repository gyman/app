<?php

namespace Gyman\Bundle\ListsBundle\Services;

use Doctrine\ORM\QueryBuilder;

class EntriesList extends AbstractList
{
    protected $listname = "entries";
    protected $listTrPartial = "ListsBundle:Entries:_list_tr.html.twig";
    protected $columnsCount = 5;
    protected $sortingColumns = array(
        "m.name",
        "e.created",
        "a.name",
        "e.entryType"
    );

    protected function addJoins(QueryBuilder $query)
    {
        $query->join("e.member", "m");
        $query->leftJoin("e.voucher", "v");
        $query->join("e.occurence", "o");
        $query->join("o.event", "ev");
        $query->join("ev.activity", "a");
    }

    public function getSortingFunction($sortingColumnsCount, $sortingColumnArray, $sortingOrderArray)
    {
        /**
         * @var Closure
         */

        return function (QueryBuilder $query) use ($sortingColumnsCount, $sortingColumnArray, $sortingOrderArray) {
            if ($sortingColumnsCount == 0) {
                return;
            }

            for ($a = 0; $a < $sortingColumnsCount; $a++) {
                $column = (int) $sortingColumnArray[$a];
                $order = strtoupper($sortingOrderArray[$a]);

                if (!key_exists($column, $this->sortingColumns)) {
                    continue;
                }

                $columnName = $this->sortingColumns[$column];

                if ($a == 0) {
                    $query->orderBy($columnName, $order);
                } else {
                    $query->addOrderBy($columnName, $order);
                }
            }
        };
    }
}
