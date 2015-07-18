<?php

namespace Gyman\Bundle\FiltersBundle\Traits;

use Gyman\Bundle\FiltersBundle\Filters\FilterInterface;

trait GetFormType
{
    /**
     *
     * @param  \Gyman\Bundle\FiltersBundle\Filters\FilterInterface $filter
     * @return Symfony\Component\Form\AbstractType
     */
    private function getFormType(FilterInterface $filter)
    {
        $classname = '\\Dende\\FiltersBundle\\Form\\Subfilters\\' . $this->parseClassname($filter) . 'Type';

        return new $classname();
    }
}
