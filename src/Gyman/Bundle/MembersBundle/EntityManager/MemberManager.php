<?php

namespace Gyman\Bundle\MembersBundle\EntityManager;

use Gyman\Bundle\BaseBundle\EntityManager\BaseManager;
use Gyman\Bundle\MembersBundle\Event\MemberCreatedEvent;
use Gyman\Bundle\MembersBundle\MembersEvents;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Gyman\Bundle\MembersBundle\Event\MemberEditedEvent;

class MemberManager extends BaseManager
{
    public function save($object, $withFlush = true)
    {
        $isNew = $object->getId() == null ? true : false;

        parent::save($object, $withFlush);

        if ($isNew) {
            $this->dispatcher->dispatch(MembersEvents::CREATED, new MemberCreatedEvent($object));
        } else {
            $this->dispatcher->dispatch(MembersEvents::EDITED, new MemberEditedEvent($object));
        }
    }
}
