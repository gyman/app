<?php
namespace Gyman\Domain\Member\Details;

class Belt
{
    const BELT_WHITE = 'white';
    const BELT_BLUE = 'blue';
    const BELT_PURPLE = 'purple';
    const BELT_BROWN = 'brown';
    const BELT_BLACK = 'black';

    public static $colors = [
        self::BELT_WHITE,
        self::BELT_BLUE,
        self::BELT_PURPLE,
        self::BELT_BROWN,
        self::BELT_BLACK,
    ];

    /**
     * @var string
     */
    protected $color;

    /**
     * Belt constructor.
     * @param string $color
     */
    public function __construct($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function color()
    {
        return $this->color;
    }
}
