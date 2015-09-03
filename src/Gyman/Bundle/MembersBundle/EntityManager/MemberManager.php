<?php
namespace Gyman\Bundle\MembersBundle\EntityManager;

use Gyman\Bundle\BaseBundle\EntityManager\BaseManager;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\MembersBundle\Event\MemberCreatedEvent;
use Gyman\Bundle\MembersBundle\Event\MemberEditedEvent;
use Gyman\Bundle\MembersBundle\MembersEvents;

/**
 * Class MemberManager
 * @package Gyman\Bundle\MembersBundle
 */
class MemberManager extends BaseManager
{
    /**
     * @param Member $object
     * @param bool|true $withFlush
     */
    public function save($object, $withFlush = true)
    {
        $isNew = $object->id() == null ? true : false;

        parent::save($object, $withFlush);

        if ($isNew) {
            $this->dispatcher->dispatch(MembersEvents::CREATED, new MemberCreatedEvent($object));
        } else {
            $this->dispatcher->dispatch(MembersEvents::EDITED, new MemberEditedEvent($object));
        }
    }
}
