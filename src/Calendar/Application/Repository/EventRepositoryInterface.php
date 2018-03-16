<?php
namespace Gyman\Calendar\Application\Repository;

use Gyman\Calendar\Domain\Calendar\Event;
use Gyman\Calendar\Domain\Calendar\Event\Occurrence;
use Doctrine\Common\Collections\Collection;

/**
 * Interface EventRepositoryInterface.
 */
interface EventRepositoryInterface
{
    public function insert(Event $event);

    public function update(Event $event);

    public function remove(Event $event);

    /**
     * @return Event[]|Collection
     */
    public function findAll();

    /**
     * @param Occurrence $occurrence
     *
     * @return Event|null
     */
    public function findOneByOccurrence(Occurrence $occurrence);

    /**
     * @param string $id
     *
     * @return Event|null
     */
    public function findOneById(string $id);
}
