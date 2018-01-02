<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Form\DataTransformer;

use DateTime;
use Symfony\Component\Form\DataTransformerInterface;

class DateToStringTransformer implements DataTransformerInterface
{
    /**
     * @param string $string
     *
     * @return DateTime | null
     */
    public function transform($string)
    {
        if ($string) {
            return new DateTime($string);
        }
    }

    /**
     * @param DateTime $date
     *
     * @return string
     */
    public function reverseTransform($date)
    {
        if ($date) {
            return $date->format('Y-m-d');
        }
    }
}
