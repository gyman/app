<?php
namespace Gyman\Bundle\ReportsBundle\Generator;

final class ReportsGenerator
{
    public function generate(StrategyInterface $strategy)
    {

        $qb = $strategy->getQueryBuilder();
        $query = $strategy->createQuery($qb);
    }
}
