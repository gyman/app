<?php
namespace Gyman\Bundle\CalendarBundle\Form\Type;

/**
 * Class UpdateNameTrait.
 */
trait UpdateNameTrait
{
    /**
     * @param $prefix
     *
     * @return \Closure
     */
    private function updateNames($prefix)
    {
        return function ($element) use ($prefix) {
            return sprintf('dende_calendar.form.%s.%s', $prefix, $element);
        };
    }
}
