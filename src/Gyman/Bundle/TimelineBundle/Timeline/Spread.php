<?php

namespace Gyman\Bundle\TimelineBundle\Timeline;

use Spy\Timeline\Spread\SpreadInterface;
use Spy\Timeline\Model\ActionInterface;
use Spy\Timeline\Spread\Entry\EntryCollection;
use Spy\Timeline\Spread\Entry\EntryUnaware;
use Spy\Timeline\Spread\Entry\Entry;
use Doctrine\ORM\EntityManager;
use Gyman\Bundle\UserBundle\Entity\User;

class Spread implements SpreadInterface
{
    /**
     * @var EntityManager $entityManager
     */
    protected $entityManager;

    /**
     * @var EntityManager $entityManager
     */
    protected $defaultManager;

    const USER_CLASS = 'Gyman\Bundle\UserBundle\Entity\User';
    const MEMBER_CLASS = 'Gyman\Bundle\MembersBundle\Entity\Member';
    const VOUCHER_CLASS = 'Gyman\Bundle\VouchersBundle\Entity\Voucher';
    const ENTRY_CLASS = 'Gyman\Bundle\EntriesBundle\Entity\Entry';

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param EntityManager $defaultManager
     */
    public function setDefaultManager($defaultManager)
    {
        $this->defaultManager = $defaultManager;
    }


    /**
     * {@inheritdoc}
     */
    public function supports(ActionInterface $action)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ActionInterface $action, EntryCollection $coll)
    {
        $this->insertMember($action, $coll);
    }

    private function insertMember(ActionInterface $action, EntryCollection $coll)
    {
        $subject = $action->getSubject();

        if (($subject->getModel() === self::MEMBER_CLASS) === false) {
            return;
        }

        $entry = new Entry($subject);
        $coll->add($entry);
    }
}
