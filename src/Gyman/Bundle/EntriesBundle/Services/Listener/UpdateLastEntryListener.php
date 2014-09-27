<?php

namespace Gyman\Bundle\EntriesBundle\Services\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UpdateLastEntryListener
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        /** @var Entry $entity */
        $entity = $args->getEntity();

        if ($entity instanceof Entry) {
            /** @var Member */
            $member = $entity->getMember();
            $member->setLastEntry($entity);
            $this->container->get("member_manager")->save($member);

            $this->container->get('logger')->info(sprintf("Member#%d lastEntry set to entry#%d", $member->getId(), $entity->getId()));
        }
    }
}