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

    CONST USER_CLASS = 'Gyman\Bundle\UserBundle\Entity\User';
    CONST MEMBER_CLASS = 'Gyman\Bundle\MembersBundle\Entity\Member';
    CONST VOUCHER_CLASS = 'Gyman\Bundle\VouchersBundle\Entity\Voucher';
    CONST ENTRY_CLASS = 'Gyman\Bundle\EntriesBundle\Entity\Entry';

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
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
        $this->insertAdministrators($coll);
        $this->insertMember($action, $coll);
    }

    private function insertAdministrators(EntryCollection $coll)
    {
        $administrators = $this->entityManager
            ->getRepository("UserBundle:User")
            ->getAdministrators();

        /**
         * @var $administrator User
         */
        foreach ($administrators as $administrator) {
            $entry = new EntryUnaware(self::USER_CLASS, $administrator->getId());
            $coll->add($entry);
        }
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
