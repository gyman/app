<?php
namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

/**
 * Class Belt
 * @package Gyman\Bundle\FiltersBundle\Filters
 * @todo move queries to repository
 */
class Belt extends AbstractSubfilter
{
    private $belts = [
        'white',
        'blue',
        'purple',
        'brown',
        'black',
    ];
    private $beltIndex;

    public function apply(QueryBuilder $queryBuilder)
    {
        $this->beltIndex = array_search($this['belt'], $this->belts);
        $this->{$this['type']}($queryBuilder);
    }

    protected function lt(QueryBuilder $queryBuilder)
    {
        $lowerThanBelts = array_slice($this->belts, $this->beltIndex);
        $queryBuilder->andWhere(
            $queryBuilder->expr()->orX(
                $queryBuilder->expr()->notIn('m.belt', $lowerThanBelts),
                $queryBuilder->expr()->isNull('m.belt')
            )
        );
    }

    protected function gt(QueryBuilder $queryBuilder)
    {
        $greaterThanBelts = array_slice($this->belts, 0, $this->beltIndex + 1);
        $queryBuilder->andWhere($queryBuilder->expr()->notIn('m.belt', $greaterThanBelts));
        $queryBuilder->andWhere('m.belt is not null');
    }

    protected function eq(QueryBuilder $queryBuilder)
    {
        $queryBuilder->setParameter('belt', $this['belt']);

        if ($this['belt'] == 'white') {
            $queryBuilder->andWhere(
                $queryBuilder->expr()->orX(
                    $queryBuilder->expr()->eq('m.belt', ':belt'),
                    $queryBuilder->expr()->isNull('m.belt')
                )
            );
        } else {
            $queryBuilder->andWhere('m.belt = :belt');
        }
    }

    protected function not(QueryBuilder $queryBuilder)
    {
        $queryBuilder->setParameter('belt', $this['belt']);
        $exp = $queryBuilder->expr();

        if ($this['belt'] == 'white') {
            $queryBuilder->andWhere($exp->not($exp->eq('m.belt', ':belt')));
            $queryBuilder->andWhere($exp->isNotNull('m.belt'));
        } else {
            $queryBuilder->andWhere('m.belt != :belt');
        }
    }
}
