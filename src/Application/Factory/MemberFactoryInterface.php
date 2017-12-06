<?php
namespace Gyman\Application\Factory;

interface MemberFactoryInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public static function createFromArray($array);
}
