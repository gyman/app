<?php

declare(strict_types=1);

namespace Gyman\Application\Factory;

interface MemberFactoryInterface
{
    /**
     * @param $params
     * @param mixed $array
     *
     * @return mixed
     */
    public static function createFromArray($array);
}
