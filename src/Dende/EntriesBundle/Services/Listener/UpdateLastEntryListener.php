<?php

namespace Dende\EntriesBundle\Services\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Dende\VouchersBundle\Entity\Voucher;
use Dende\MembersBundle\Entity\Member;
use Dende\EntriesBundle\Entity\Entry;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UpdateLastEntryListener {

    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function postPersist(LifecycleEventArgs $args) {
        /** @var Voucher */
        $entity = $args->getEntity();

        if ($entity instanceof Entry)
        {
            $voucher = $entity->getVoucher();
            
            if($voucher == null) // entry paid or free
            {
                return false;
            }
            
            /** @var Member */
            $member = $voucher->getMember();
            $member->setLastEntry($entity);
            $this->container->get("member_manager")->save($member);

            $this->container->get('logger')->info(sprintf("Member#%d lastEntry set to entry#%d", $member->getId(), $entity->getId()));
        }
    }
}
