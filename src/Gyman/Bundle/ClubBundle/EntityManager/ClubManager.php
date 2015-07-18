<?php
namespace Gyman\Bundle\ClubBundle\EntityManager;

use Gyman\Bundle\BaseBundle\EntityManager\BaseManager;
use Gyman\Bundle\MembersBundle\ClubsEvents;
use Gyman\Bundle\MembersBundle\Event\ClubCreatedEvent;

class ClubManager extends BaseManager
{
    public function save($object, $withFlush = true)
    {
        $isNew = $object->getId() == null ? true : false;

        parent::save($object, $withFlush);

        if ($isNew) {
            $this->dispatcher->dispatch(ClubsEvents::CREATED, new ClubCreatedEvent($object));
        }
    }
}
