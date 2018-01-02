<?php

declare(strict_types=1);

namespace Gyman\Bundle\ReportsBundle\Generator\Strategy;

use Gyman\Bundle\ReportsBundle\Form\DateFilter;
use Gyman\Bundle\ReportsBundle\Generator\StrategyInterface;

abstract class AbstractStrategy implements StrategyInterface
{
    abstract public function getName();

    abstract public function result(DateFilter $filter);
}
