<?php
namespace Dende\Calendar\Domain\Calendar\Event\Occurrence;

/**
 * Class OccurrenceId
 * @package Dende\Calendar\Domain\Calendar\Event\Occurrence
 */
class OccurrenceId
{
    /**
     * @var
     */
    private $id;

    /**
     * OccurrenceId constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }
}
