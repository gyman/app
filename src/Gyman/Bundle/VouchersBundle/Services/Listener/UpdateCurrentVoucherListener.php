<?php

namespace Gyman\Bundle\VouchersBundle\Services\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Gyman\Bundle\MembersBundle\Entity\Member;
use DateTime;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UpdateCurrentVoucherListener
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        /** @var Voucher */
        $entity = $args->getEntity();

        if ($entity instanceof Voucher) {
            $now = new DateTime();

            if ($entity->getStartDate() < $now && $entity->getEndDate() > $now) {
                /** @var Member */
                $member = $entity->getMember();
                $member->setCurrentVoucher($entity);
                $this->container->get("member_manager")->save($member);

                $this->container->get('logger')->info(sprintf("Member#%d currentVoucher set to voucher#%d", $member->getId(), $entity->getId()));
            }
        }
    }
}
