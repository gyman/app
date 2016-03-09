<?php
namespace Gyman\Bundle\ReportsBundle\Generator\Strategy;

use Doctrine\ORM\EntityRepository;
use Gyman\Bundle\ReportsBundle\Generator\StrategyInterface;

abstract class AbstractStrategy implements StrategyInterface
{
    /**
     * @var EntityRepository
     */
    private $repository;

    /**
     * @return EntityRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param EntityRepository $repository
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
    }

    abstract public function createQuery($qb);
}
