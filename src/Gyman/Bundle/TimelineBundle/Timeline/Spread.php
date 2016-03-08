<?php
namespace Gyman\Bundle\TimelineBundle\Timeline;

use Doctrine\ORM\EntityManager;
use Gyman\Bundle\AppBundle\Globals;
use Spy\Timeline\Model\ActionInterface;
use Spy\Timeline\Spread\Entry\Entry;
use Spy\Timeline\Spread\Entry\EntryCollection;
use Spy\Timeline\Spread\Entry\EntryUnaware;
use Spy\Timeline\Spread\SpreadInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class Spread implements SpreadInterface
{
    /**
     * @var EntityManager $clubManager
     */
    protected $clubManager;

    /**
     * @var Session $session
     */
    protected $session;

    /**
     * @var EntityManager $entityManager
     */
    protected $defaultManager;

    const CLUB_CLASS = 'Gyman\Bundle\ClubBundle\Entity\Club';
    const USER_CLASS = 'Gyman\Bundle\UserBundle\Entity\User';
    const MEMBER_CLASS = 'Gyman\Domain\Member';
    const VOUCHER_CLASS = 'Gyman\Domain\Voucher';
    const ENTRY_CLASS = 'Gyman\Bundle\EntriesBundle\Entity\Entry';

    /**
     * @param Session $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setClubManager($entityManager)
    {
        $this->clubManager = $entityManager;
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
        $this->insertClub($action, $coll);
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

    private function insertClub($action, $coll)
    {
        $club = $this->session->get(Globals::CURRENT_CLUB_SESSION_KEY);
        $clubEntry = new EntryUnaware(self::CLUB_CLASS, $club->getId());
        $coll->add($clubEntry);
    }
}
