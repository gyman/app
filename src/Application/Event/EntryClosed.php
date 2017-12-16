<?php
namespace Gyman\Application\Event;

use Ramsey\Uuid\UuidInterface;
use Symfony\Component\EventDispatcher\Event;

class EntryClosed extends Event
{
    public const NAME = 'gyman.entry_closed';

    /** @var UuidInterface */
    private $entryId;

    public function __construct(UuidInterface $entryId)
    {
        $this->entryId = $entryId;
    }

    public function entryId(): UuidInterface
    {
        return $this->entryId;
    }
}
