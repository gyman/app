<?php
namespace Gyman\Bundle\ClubBundle\EntityManager;

use Gyman\Bundle\AppBundle\ClubsEvents;
use Gyman\Bundle\AppBundle\Event\ClubCreatedEvent;
use Gyman\Bundle\BaseBundle\EntityManager\BaseManager;

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
