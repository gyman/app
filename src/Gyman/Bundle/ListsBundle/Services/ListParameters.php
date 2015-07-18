<?php

namespace Gyman\Bundle\ListsBundle\Services;

use Doctrine\ORM\QueryBuilder;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

class ListParameters
{
    /**
     * @var \Closure
     */
    private $sortingFunction;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var array
     */
    private $columns = [];

    public function get($param)
    {
        return $this->getRequest()->get($param);
    }

    public function __construct(Container $container)
    {
        $this->setRequest($container->get('request'));
    }

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

    public function applyRequest(QueryBuilder $query)
    {
        $this->applyLimit($query);
        $this->applyOffset($query);
        $this->applySearch($query);
        $this->applySort($query);
    }

    public function applyLimit(QueryBuilder $query)
    {
        $limit = $this->getRequest()->get('iDisplayLength', 10);

        if (!$limit) {
            return;
        }

        $query->setMaxResults($limit);
    }

    public function applyOffset(QueryBuilder $query)
    {
        $offset = $this->getRequest()->get('iDisplayStart', 0);

        if (!$offset) {
            return;
        }

        $query->setFirstResult($offset);
    }

    public function applySearch(QueryBuilder $qb)
    {
        $search = $this->getRequest()->get('sSearch', null);

        if (!$search) {
            return;
        }

        $qb->andWhere($qb->expr()->orX(
            $qb->expr()->like('m.name', ':string'),
            $qb->expr()->like('m.barcode', ':string'),
            $qb->expr()->like('m.notes', ':string')
        ));

        $qb->setParameter('string', '%' . $search . '%');
    }

    public function applySort(QueryBuilder $query)
    {
        $closure = $this->getSortingFunction();
        $closure($query);
    }

    public function getSortingColumnsCount()
    {
        return (int) $this->getRequest()->get('iSortingCols');
    }

    public function getSortingColumns()
    {
        $array = [];
        $count = $this->getSortingColumnsCount();
        for ($a = 0; $a < $count; $a++) {
            $array[] = $this->getRequest()->get('iSortCol_' . $a);
        }

        return $array;
    }

    public function getSortingOrders()
    {
        $array = [];
        $count = $this->getSortingColumnsCount();
        for ($a = 0; $a < $count; $a++) {
            $array[] = $this->getRequest()->get('sSortDir_' . $a);
        }

        return $array;
    }
}
