<?php
namespace Gyman\Domain\Factory;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Model\Duration;
use Gyman\Domain\Model\Occurence;

/**
 * Class OccurenceFactory
 * @package Gyman\Domain\Factory
 */
final class OccurenceFactory
{

    /**
     * @param array $array
     * @return Occurence
     */
    public static function createFromArray($array = [])
    {
        $template = [
            'startDate'      => new DateTime(),
            'duration'       => new Duration(90)
        ];

        $array = array_merge($template, $array);

        return new Occurence(
            $array["startDate"],
            $array["duration"]
        );
    }
}