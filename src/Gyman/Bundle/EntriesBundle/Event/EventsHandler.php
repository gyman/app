<?php
namespace Gyman\Bundle\EntriesBundle\Event;

use Doctrine\ORM\EntityManager;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;

class EventsHandler
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function onEntryCreated(EntryCreatedEvent $event)
    {
        $entry = $event->getEntry();
        $member = $entry->getMember();
        $member->setLastEntry($entry);

        /**
         * @var Voucher
         */
        $voucher = $entry->getVoucher();

        if ($voucher && $voucher->getAmount() !== null && $voucher->getAmount() > 0) {
            $amountLeft = $voucher->getAmountLeft() - 1;

            $voucher->setAmountLeft($amountLeft);
            $this->entityManager->persist($voucher);
        }

        $this->entityManager->persist($member);
        $this->entityManager->flush();



    }
}
