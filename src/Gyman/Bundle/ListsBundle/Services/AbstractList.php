<?php

namespace Gyman\Bundle\ListsBundle\Services;

use Gyman\Bundle\FiltersBundle\Services\FilterProvider;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractList
{
    protected $listname;
    protected $templating;
    protected $listTrPartial;
    protected $sortingColumns = array();

    /**
     *
     * @var EntityRepository
     */
    protected $repository;

    /**
     *
     * @var ListParameters
     */
    protected $listParameters;

    /**
     *
     * @var FilterProvider
     */
    protected $filterProvider;

    public function getSortingColumns()
    {
        return $this->sortingColumns;
    }

    public function setSortingColumns($sortingColumns)
    {
        $this->sortingColumns = $sortingColumns;
    }

    public function getSortingFunction($sortingColumnsCount, $sortingColumnArray, $sortingOrderArray)
    {
        return function (QueryBuilder $query) use ($sortingColumnsCount, $sortingColumnArray, $sortingOrderArray) {

        };
    }

    public function getListTrPartial()
    {
        return $this->listTrPartial;
    }

    public function getFilterProvider()
    {
        return $this->filterProvider;
    }

    public function getRepository()
    {
        return $this->repository;
    }

    public function getTemplating()
    {
        return $this->templating;
    }

    public function setTemplating($templating)
    {
        $this->templating = $templating;
    }

    public function setRepository(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function setListParameters(ListParameters $listParameters)
    {
        $this->listParameters = $listParameters;
    }

    public function setFilterProvider(FilterProvider $filterProvider)
    {
        $this->filterProvider = $filterProvider;
    }

    public function getListname()
    {
        return $this->listname;
    }

    /**
     *
     * @return QueryBuilder
     */
    protected function getDataViewQuery()
    {
        $filter = $this->getFilterProvider()->getListFilter($this->getListname());

        $query = $this->getRepository()->getQuery();
        $this->addJoins($query);

        if ($filter) {
            $filter->apply($query);
        }

        return $query;
    }

    public function getFullDataView()
    {
        return $this->getDataViewQuery()->getQuery()->execute();
    }

    public function getResults()
    {
        $query = $this->getDataViewQuery();

        $sortingColumnsCount = $this->getListParameters()->getSortingColumnsCount();
        $sortingColumnArray = $this->getListParameters()->getSortingColumns();
        $sortingOrderArray = $this->getListParameters()->getSortingOrders();

        $sortingFunction = $this->getSortingFunction($sortingColumnsCount, $sortingColumnArray, $sortingOrderArray);

        $this->getListParameters()->setColumns($this->getSortingColumns());
        $this->getListParameters()->setSortingFunction($sortingFunction);
        $this->getListParameters()->applyRequest($query);

        $totalCount = $this->getRepository()->getTotalCount();

        $paginator = $this->getRepository()->getPaginator($query);

        $displayedCount = count($paginator);

        $datatable = array(
            "sEcho"                => $this->getListParameters()->get("sEcho"),
            "iTotalRecords"        => $totalCount,
            "iTotalDisplayRecords" => $displayedCount,
            "aaData"               => array()
        );

        if ($displayedCount > 0) {
            $template = array_fill(0, $this->columnsCount, null);

            foreach ($paginator as $entity) {
                $datatable["aaData"][] = array_replace($template, array(
                    $this->getTemplating()->render($this->getListTrPartial(), array("entity" => $entity))
                ));
            }
        }

        return $datatable;
    }

    protected function addJoins(QueryBuilder $query)
    {
    }

    public function getListParameters()
    {
        return $this->listParameters;
    }
}
