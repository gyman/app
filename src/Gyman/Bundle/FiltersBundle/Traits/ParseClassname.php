<?php

namespace Gyman\Bundle\FiltersBundle\Traits;

trait ParseClassname
{

    private function parseClassname($object)
    {
        return join('', array_slice(explode('\\', get_class($object)), -1));
    }
}
