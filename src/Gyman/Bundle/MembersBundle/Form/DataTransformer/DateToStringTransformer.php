<?php

namespace Gyman\Bundle\MembersBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use DateTime;

class DateToStringTransformer implements DataTransformerInterface
{
    /**
     *
     * @param  string   $string
     * @return DateTime | null
     */
    public function transform($string)
    {
        if ($string) {
            return new DateTime($string);
        }
    }

    /**
     *
     * @param  DateTime $date
     * @return string
     */
    public function reverseTransform($date)
    {
        if ($date) {
            return $date->format("Y-m-d");
        }
    }
}
