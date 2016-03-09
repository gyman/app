<?php
/**
 * Created by PhpStorm.
 * User: uirapuru
 * Date: 10.01.16
 * Time: 18:46
 */

namespace Gyman\Bundle\ReportsBundle\Generator;

interface StrategyInterface
{
    public function getRepository();

    public function setRepository(EntityRepository $repository);

    public function createQuery($qb);
}
