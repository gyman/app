<?php
namespace Gyman\Domain\Model;

/**
 * Class Section
 * @package Gyman\Domain\Model
 */
class Section
{
    /**
     * @var string
     */
    private $title;

    /**
     * Section constructor.
     * @param $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }
}
