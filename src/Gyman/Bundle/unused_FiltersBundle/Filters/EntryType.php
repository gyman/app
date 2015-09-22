<?php
namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

class EntryType extends AbstractSubfilter
{
    public function apply(QueryBuilder $queryBuilder)
    {
        $method = $this['type'];
        $queryBuilder->setParameter('entryType', $this['entryType']);
        $this->$method($queryBuilder);
    }

    protected function eq(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere('e.entryType = :entryType');
    }

    protected function not(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere('e.entryType != :entryType');
    }
}
