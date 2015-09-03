<?php
namespace Gyman\Component\Members\Factory;

interface MemberFactoryInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public static function createFromArray($array);
}
