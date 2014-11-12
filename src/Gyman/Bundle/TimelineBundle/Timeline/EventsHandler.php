<?php
namespace Gyman\Bundle\TimelineBundle\Timeline;

use Gyman\Bundle\EntriesBundle\Event\EntryCreatedEvent;
use Gyman\Bundle\MembersBundle\Event\MemberCreatedEvent;
use Gyman\Bundle\VouchersBundle\Event\VoucherCreatedEvent;
use Spy\TimelineBundle\Driver\ORM\ActionManager;
use Symfony\Component\Security\Core\SecurityContext;
use Gyman\Bundle\UserBundle\Entity\User;

class EventsHandler
{

    const VERB_BOUGHT = 'bought';
    const VERB_PAID = 'paid';
    const VERB_ENTERED = 'entered';
    const VERB_LEFT = 'left';
    const VERB_CREATED = 'created';

    public static $translationKeys = [
        self::VERB_BOUGHT => "timeline.verb.bought",
        self::VERB_PAID => "timeline.verb.paid",
        self::VERB_ENTERED => "timeline.verb.entered",
        self::VERB_LEFT => "timeline.verb.left",
        self::VERB_CREATED => "timeline.verb.created",
    ];

    /**
     * @var User $user
     */
    private $user;

    private $actionManager;

    public function __construct(SecurityContext $context, ActionManager $actionManager)
    {
        $this->user = $context->getToken()->getUser();
        $this->actionManager = $actionManager;
    }

    public function onMemberCreated(MemberCreatedEvent $event)
    {
        $member = $event->getMember();
        $subject = $this->actionManager->findOrCreateComponent($member);

        $this->insertData($subject, self::$translationKeys[self::VERB_CREATED]);
    }

    public function onVoucherCreated(VoucherCreatedEvent $event)
    {
        $member = $event->getMember();
        $voucher = $event->getVoucher();

        $subject = $this->actionManager->findOrCreateComponent($member);
        $complement = $this->actionManager->findOrCreateComponent($voucher);

        $this->insertData($subject, self::$translationKeys[self::VERB_BOUGHT], $complement);
    }

    public function onEntryCreated(EntryCreatedEvent $event)
    {
        $entry = $event->getEntry();
        $member = $entry->getMember();

        $subject = $this->actionManager->findOrCreateComponent($member);
        $complement = $this->actionManager->findOrCreateComponent($entry);

        $this->insertData($subject, self::$translationKeys[self::VERB_ENTERED], $complement);
    }

    private function insertData($subject, $verb, $complement = null)
    {
        $components = ["indirectComplement" => $this->user->getFullname()];

        if ($complement !== null) {
            $components["directComplement"] = $complement;
        }

        $action = $this->actionManager->create($subject, $verb, $components);
        $this->actionManager->updateAction($action);
    }
}
