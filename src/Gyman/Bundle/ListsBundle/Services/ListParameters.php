<?php

namespace Gyman\Bundle\ListsBundle\Services;

use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\Container;

class ListParameters
{
// <editor-fold defaultstate="collapsed" desc="fields">

    /**
     *
     * @var \Closure
     */
    private $sortingFunction;

    /**
     *
     * @var Request
     */
    private $request;

    /**
     *
     * @var array
     */
    private $columns = array();

// </editor-fold>
    public function get($param)
{
        return $this->getRequest()->get($param);
    }

//    public function __construct(Request $request) {
//        $this->setRequest($request);
//    }
    public function __construct(Container $container)
{
        $this->setRequest($container->get("request"));
    }

// <editor-fold defaultstate="collapsed" desc="setters and getters">

    public function getSortingFunction()
    {
        return $this->sortingFunction;
    }

    public function setSortingFunction(\Closure $sortingFunction)
    {
        $this->sortingFunction = $sortingFunction;
    }

    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

// </editor-fold>

    public function applyRequest(QueryBuilder $query)
    {
        $this->applyLimit($query);
        $this->applyOffset($query);
        $this->applySearch($query);
        $this->applySort($query);
    }

    public function applyLimit(QueryBuilder $query)
    {
        $limit = $this->getRequest()->get("iDisplayLength", 10);

        if (!$limit) {
            return;
        }

        $query->setMaxResults($limit);
    }

    public function applyOffset(QueryBuilder $query)
    {
        $offset = $this->getRequest()->get("iDisplayStart", 0);

        if (!$offset) {
            return;
        }

        $query->setFirstResult($offset);
    }

    public function applySearch(QueryBuilder $qb)
    {
        $search = $this->getRequest()->get("sSearch", null);

        if (!$search) {
            return;
        }

        $qb->andWhere($qb->expr()->orX(
            $qb->expr()->like("m.name", ":string"), $qb->expr()->like("m.barcode", ":string"), $qb->expr()->like("m.notes", ":string")
        ));
        $qb->setParameter("string", "%" . $search . "%");
    }

    public function applySort(QueryBuilder $query)
    {
        $closure = $this->getSortingFunction();
        $closure($query);

        return;
    }

    public function getSortingColumnsCount()
    {
        return (int) $this->getRequest()->get("iSortingCols");
    }

    public function getSortingColumns()
    {
        $array = array();
        $count = $this->getSortingColumnsCount();
        for ($a = 0; $a < $count; $a++) {
            $array[] = $this->getRequest()->get("iSortCol_" . $a);
        }

        return $array;
    }

    public function getSortingOrders()
    {
        $array = array();
        $count = $this->getSortingColumnsCount();
        for ($a = 0; $a < $count; $a++) {
            $array[] = $this->getRequest()->get("sSortDir_" . $a);
        }

        return $array;
    }
}
