<?php
namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

interface FilterInterface
{
    /**
     * @return null
     */
    public function apply(QueryBuilder $queryBuilder);
}
