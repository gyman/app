<?php
namespace Gyman\Bundle\AppBundle\Form\DataTransformer;

use DateTime;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Fixes start and end date hour in voucher
 *
 * Class VoucherDateTransformer
 * @package Gyman\Bundle\AppBundle\Form\DataTransformer
 */
class VoucherDateTransformer implements DataTransformerInterface
{
    /**
     * @var string
     */
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
    public function transform($id)
    {
        if (!$id instanceof DateTime) {
            return;
        }

        return $this->fixHour($id);
    }

    /**
     *
     * @param  DateTime $date
     * @return string
     */
    public function reverseTransform($datetime)
    {
        if (!$datetime instanceof DateTime) {
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
