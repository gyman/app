<?php

namespace Gyman\Bundle\MembersBundle\EntityManager;

use Gyman\Bundle\BaseBundle\EntityManager\BaseManager;
use Gyman\Bundle\MembersBundle\Event\MemberCreatedEvent;
use Gyman\Bundle\MembersBundle\MembersEvents;
use Symfony\Component\EventDispatcher\EventDispatcher;

class MemberManager extends BaseManager
{
    public function save($object, $withFlush = true)
    {
//        @todo: change methods to "create" and "update"
        parent::save($object, $withFlush);

        $this->dispatcher->dispatch(MembersEvents::CREATED, new MemberCreatedEvent($object));
    }
}
