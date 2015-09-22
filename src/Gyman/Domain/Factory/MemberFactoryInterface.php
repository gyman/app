<?php
namespace Gyman\Domain\Factory;

interface MemberFactoryInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public static function createFromArray($array);
}
