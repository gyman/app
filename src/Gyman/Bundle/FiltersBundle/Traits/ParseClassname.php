<?php

namespace Gyman\Bundle\FiltersBundle\Traits;

trait ParseClassname
{
    private function parseClassname($object)
    {
        return implode('', array_slice(explode('\\', get_class($object)), -1));
    }
}
