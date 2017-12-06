<?php
namespace Gyman\Bundle\ReportsBundle\Generator\Strategy;

use Doctrine\ORM\EntityRepository;
use Gyman\Bundle\ReportsBundle\Form\DateFilter;
use Gyman\Bundle\ReportsBundle\Generator\StrategyInterface;

abstract class AbstractStrategy implements StrategyInterface
{
    abstract public function getName();

    abstract public function result(DateFilter $filter);
}