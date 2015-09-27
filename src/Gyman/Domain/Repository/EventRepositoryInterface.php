<?php
namespace Gyman\Domain\Repository;

/**
 * Interface EventRepositoryInterface
 * @package Gyman\Domain\Repository
 */
interface EventRepositoryInterface
{

    /**
     * @param $event
     * @return mixed
     */
    public function insert($event);
}