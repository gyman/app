<?php
namespace Gyman\Component\Members\Factory;

interface MemberFactoryInterface
{
    /**
     * @param $params
     * @return mixed
     */
    static public function createFromArray($array);
}