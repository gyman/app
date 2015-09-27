<?php
namespace Gyman\Domain\Model;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Event
 * @package Gyman\Domain\Model
 */
class Event
{
    /**
     * @var string
     */
    private $title;

    /** @var ArrayCollection|Occurence[] */
    private $occurences;

    /**
     * @var EventType
     */
    private $type;

    /**
     * @var Repetitions
     */
    private $repetitions;

    /**
     * Event constructor.
     * @param EventType $type
     * @param string $title
     * @param ArrayCollection|Occurence[] $occurences
     * @param Repetitions $repetitions
     */
    public function __construct(EventType $type, $title, ArrayCollection $occurences, Repetitions $repetitions)
    {
        $this->title = $title;
        $this->occurences = $occurences;
        $this->repetitions = $repetitions;
        $this->type = $type;
    }

    /**
     * @return ArrayCollection|Occurence[]
     */
    public function occurences()
    {
        return $this->occurences;
    }
}