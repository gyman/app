<?php

namespace Gyman\Bundle\VouchersBundle\Form\DataTransformer;

use DateTime;
use Symfony\Component\Form\DataTransformerInterface;

class VoucherDateTransformer implements DataTransformerInterface
{
    protected $mode;

    public function __construct($mode)
    {
        $this->mode = $mode;
    }

    /**
     *
     * @param  string   $string
     * @return DateTime | null
     */
    public function transform($datetime)
    {
        if (!$datetime instanceof DateTime) {
            //            return new DateTime();
            return;
        }

        return $this->fixHour($datetime);
    }

    /**
     *
     * @param  DateTime $date
     * @return string
     */
    public function reverseTransform($datetime)
    {
        if (!$datetime instanceof DateTime) {
            //            return new DateTime();
            return;
        }

        return $this->fixHour($datetime);
    }

    /**
     *
     * @param  DateTime  $dateTime
     * @return \DateTime
     */
    private function fixHour($dateTime)
    {
        $string = $dateTime->format('Y-m-d');

        if ($this->mode == 'start') {
            return new DateTime($string . ' 00:00:00');
        } elseif ($this->mode == 'end') {
            return new DateTime($string . ' 23:59:59');
        }
    }
}
