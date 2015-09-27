<?php
namespace Gyman\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Calendar
 * @package Gyman\Domain\Model
 */
class Calendar
{
    private $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }

    /**
     * @param Event $event
     */
    public function insertEvent(Event $event){
        $this->events->add($event);
    }

    /**
     * @return ArrayCollection|Event[]
     */
    public function events()
    {
        return $this->events;
    }
}